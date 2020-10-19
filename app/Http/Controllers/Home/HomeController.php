<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductImg;
use App\Model\Order;
use App\Model\OrderDetail;
use Cart;
use Auth;
use DB;
class HomeController extends Controller
{
  // public function __construct()
  // {
   
  //   $data_send = ['media_slider' => $media_slider];
  //   View::share($data_send);
  // } 
  public function index()
  {
    $proBuy = Product::orderBy("buy_count","DESC")->get();
    $proNew = Product::orderBy("created_at","DESC")->get();
    $proSale = Product::where("promotional_price",">",0)->get();
    $dataCate = Category::with("products")->where("status",1)->get();
    return view("home.home", compact('proBuy','proNew','proSale','dataCate'));
  }
  public function category($slug)
  {
    $listCate0 = Category::where("parent_id",0)->get();
    $dataCate = Category::where("slug",$slug)->first();
    $idin[]    = $dataCate->id;
    $cate_in   = Category::where('parent_id', $dataCate->id)->get();
    foreach ($cate_in as $item) {
        if (in_array($item->id, $idin) == false) {
            $idin[] = $item->id;
        }
    }
    $dataPro = Product::whereIn("category_id",$idin)->paginate(16);
    return view("home.category", compact('dataCate','dataPro','listCate0'));
  }
  public function categoryfilter($slug, $val)
  {

    $listCate0 = Category::where("parent_id",0)->get();
    $dataCate = Category::where("slug",$slug)->first();
    $idin[]    = $dataCate->id;
    $cate_in   = Category::where('parent_id', $dataCate->id)->get();
    foreach ($cate_in as $item) {
        if (in_array($item->id, $idin) == false) {
            $idin[] = $item->id;
        }
    }
    if ($val == "new") {
        $dataPro = Product::whereIn("category_id",$idin)->orderBy('created_at',"DESC")->paginate(16);
    }
    if($val == "asc"){
        $dataPro = Product::whereIn("category_id",$idin)->orderBy('price',"ASC")->paginate(16);
    }
    if($val == "desc"){
        $dataPro = Product::whereIn("category_id",$idin)->orderBy('price',"DESC")->paginate(16);
    }
    else{
        $dataPro = Product::whereIn("category_id",$idin)->orderBy('count_view',"ASC")->paginate(16);
    }
    return view("home.filter", compact('dataCate','dataPro','listCate0','val'));
  }
  public function detail($url)
  {
    $dataPro = Product::where("url",$url)->first();
    $dataPro->increment('count_view');
    $dataCate = Category::where("id",$dataPro->category_id)->first();
    $dataImg = ProductImg::where("product_id",$dataPro->id)->get();
    $dataProOther = Product::where("url","<>",$url)->paginate(4);
    $dataProPriceSame = Product::where('category_id',$dataPro->category_id)->where("url","<>",$url)->whereBetween('price', array($dataPro->price - 200000, $dataPro->price + 200000))->paginate(4);
    return view("home.detail", compact('dataPro','dataCate','dataImg','dataProOther','dataProPriceSame'));
  }
  //Gio hang
  public function cart()
  {
    return view("home.cart");
  }
  public function addCart(Request $req)
  {
    $stock = Product::where('id', $req->id)->value('count');
    $dataPro = Product::where('id', $req->id)->first();
    if ($dataPro->promotional_price > 0 ) {
      $price = $dataPro->promotional_price;
    }
    else{
      $price = $dataPro->price;
    }
    if ($stock >= 1 && $stock > 0) {
      Cart::add(
        [
          'id'   => $dataPro->id,
          'name' => $dataPro->name,
          'price' => $price,
          'quantity' => 1,
          'attributes' => ['avatar' =>$dataPro->image,'url' =>$dataPro->url,'product_id' => $dataPro->id]
        ]);
      $cart_data = Cart::getContent();
      $cart_subtotal = Cart::getSubTotal();
      $cartblock ='<div class="btn-cart" id="cart-block">
                <a title="My cart" href="'.url('/gio-hang').'">Giỏ hàng</a>
                <span class="notify notify-right">'.$cart_data->count().'</span>
              </div>';
      $success = 'Bạn đã thêm '.$dataPro->name.' vào giỏ hàng!';
      $error = "";
      $msg = [
      "status" =>"_success",
      "success"        => $success,
      "cartblock"        => $cartblock,
      ];
      return json_encode($msg);
    }
   
  }
  public function updateCart(Request $req)
  {
      $stock = Product::where('id',$req->product_id)->value('count');
     if ($stock > $req->qty && $stock > 0) {
          Cart::update($req->product_id,['quantity' => array(
            'relative' => false,
            'value' => $req->qty
          )]);
          $msg = [
                'status' => '_success',
                'msg'    => 'Cập nhật thành công'
          ];
        return response($msg);
     }
      else {
        $msg = [
                'status' => '_error',
                'qty_old' => $req->qty,
                'msg'    => 'Số lượng lớn quá. Hãy giảm số lượng'
            ];
        return response($msg);
      }
  }
  public function removeCart(Request $req)
  {
    if (Cart::remove($req->id)) {
      $cart_subtotal = Cart::getSubTotal();
      $msg = [
              'status' => '_success',
              'msg'    => 'Đã xóa sản phẩm khỏi giỏ hàng',
              'cart_subtotal'    => $cart_subtotal
          ];
          return response()->json($msg);
    }
    else{
      $msg = [
              'status' => '_error',
              'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại'
          ];
          return response()->json($msg);
    }
  }
  //Checkouut
  public function checkout()
  {
    return view("home.checkout");
  }
  public function finish(Request $req)
  {
    $cart_data = Cart::getContent();
    $cart_subtotal = Cart::getSubTotal();
    $order                = new Order();

    // $order->customer_id   = Auth::guard('customers')->user()->id;
    //$order->email         = Auth::guard('customers')->user()->email;
    $order->email         = $req->email;
    $order->total_price   = $cart_subtotal;
    $order->name          = $req->name;
    $order->phone         = $req->phone;
    $order->note          = $req->note;
    $order->address       = $req->address;
    $order->order_status  = $req->pay_method;
    //$order->order_method  = $req->pay_method;
     if ($order->save()) {
      $order_id     = DB::getPdo()->lastInsertId();
      foreach ($cart_data as $value) {
        $orderdetail               = new OrderDetail();
        $orderdetail->order_id     = $order_id;
        $orderdetail->product_id   = $value->attributes->product_id;
        //$orderdetail->customer_id  = Auth::guard('customers')->user()->id;
        $orderdetail->product_name = $value->name;
        $orderdetail->price        = $value->price;
        $orderdetail->quantity     = $value->quantity;
        $query = $orderdetail->save();
      }
      if ($query) {
         return redirect('/thanks');
      }
    }
  }
  public function thanks()
  {
    Cart::clear();
    return view('home.thanks');
  }
}
