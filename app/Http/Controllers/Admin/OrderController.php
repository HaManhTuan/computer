<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetail;
use DB;
class OrderController extends Controller
{
  public function view()
  {
    $orders = Order::with('orders')->orderBy('id','DESC')->get();
    return view("admin.order.list", compact('orders'));
  }
  public function detail($id)
  {
    $orderDetail    = Order::with('orders')->find($id);
    return view("admin.order.detail", compact('orderDetail'));
  }
  public function changeStatus(Request $req)
  {
    $orderStatus               = Order::with('orders')->find($req->order_id);
    $orderStatus->order_status = $req->status;
    switch ($req->status) {
      case '1':
        $content = 'Đã thay đổi trạng thái thành: Mới';
        break;
      case '2':
        $content = "Đã thay đổi trạng thái thành: Đang xử lý";
        break;
      case '3':
        $content = "Đã thay đổi trạng thái thành: Đang chuyển";
        break;
      case '4':
        $content = "Đã thay đổi trạng thái thành: Đã chuyển";
        break;
      case '5':
        $content = "Đã thay đổi trạng thái thành: Đã hủy";
        break;
    }
    if ($orderStatus->save()) {
      if ($orderStatus->order_status == 4) {
        foreach ($orderStatus->orders as $value) {
          $incrementBuy = DB::table('products')->where(['id' => $value->product_id])->increment('buy_count',$value->quantity);
           $decrementBuy = DB::table('products')->where(['id' => $value->product_id])->decrement('count',$value->quantity);
        }
        if ($incrementBuy) {
          $msg = array(
            'status' => '_success',
            'msg'    => 'Bạn đã thay đổi trạng thái thành công.',
          );
          return json_encode($msg);
        }
        else {
          $msg = array(
            'status' => '_error',
            'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại.',
          );
          return json_encode($msg);
        }
      }
      else{
          $msg = array(
            'status' => '_success',
            'msg'    => 'Bạn đã thay đổi trạng thái thành công.',
          );
          return json_encode($msg);
      }
    }
    else {
      $msg = array(
        'status' => '_error',
        'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại.',
      );
      return json_encode($msg);
    }
  }
  public function addNote(Request $req,$id)
  {
    $order = Order::find($id);
    $order->log = $req->log;
    if ($order->save()) {
      return redirect('admin/order/view-orderdetail/'.$id)->with('flash_message_success', 'Bạn đã thêm mới 1 ghi chú');
    }
    else{
      return redirect('admin/order/view-orderdetail/'.$id)->with('flash_message_error', 'Có lỗi xảy ra. Vui lòng thử lại');
    }
  }
  public function invoice($id)
  {
    $orderDetail = Order::with('orders')->find($id);
    $data_send =['id' => $id,'orderDetail'=>$orderDetail];
    return view("admin.order.invoice")->with($data_send);
  }
}
