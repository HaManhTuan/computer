<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductImg;
use Illuminate\Support\Str;
class ProductController extends Controller
{
  public function view()
  {
    $product = Product::all();
    return view('admin.product.list', compact('product'));
  }
  public function add()
  {
    $categoryController = new CategoryController();
    $data_select = $categoryController->getDataSelect(0, '', '');
    return view('admin.product.add', compact('data_select'));
  }
  public function store(Request $req)
  {
    $product = new Product();
    $product->name = $req->name;
    $product->category_id = $req->category_id;
    $product->description = $req->description;
    $product->content = $req->content;
    $product->infor = $req->infor;
   
    $price = (int)preg_replace("/[\,\.]+/", "", $req->price);
    $promotional_price = (int)preg_replace("/[\,\.]+/", "", $req->promotional_price);
    $product->price = $price;
    $product->promotional_price = $promotional_price;
    $product->sale = parent::sale($promotional_price, $price);
    $slug = Str::slug($req->name, '-');
    $product->url = $slug;
    $product->count = $req->stock;
    if ($req->hasFile('file'))
      {
          $file = $req->file('file');
          $name = $file->getClientOriginalName(); 
          $image = Str::random(4) . "_" . $name;
          while (file_exists("./uploads/images/products/" . $image))
          {
              $image = Str::random(4) . "_" . $name;
          }
          $file->move("./uploads/images/products", $image);
          $req->image = $image;
      }
    else
      {
          $req->image = "";
      }
      $product->image = $req->image;
      $product->status = $req->has('status') ? '1' : '0';
      if ($product->save())
        {
            return redirect('admin/product/view-product')->with('flash_message_success', 'Bạn đã thêm thành công');
        }
      else
        {
            return redirect('admin/product/view-product')
                ->with('flash_message_error', 'Có lỗi xảy ra vui lòng thử lại');
        }

  }
  public function uploadContent(Request $req)
  {
     if($request->hasFile('upload')) 
        {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->move('uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/'.$filenametostore);
            $msg = 'Upload ảnh thành công';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
  }
  public function uploadInfor(Request $req)
  {
     if($request->hasFile('upload')) 
        {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->move('uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/'.$filenametostore);
            $msg = 'Upload ảnh thành công';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
  }
  public function viewImg($id)
  {
    $product = Product::where('id',$id)->first();
    $productImg = ProductImg::where(['product_id' => $id])->get();
    return view('admin.product.img', compact('product','productImg'));
  }
  public function addImg(Request $req, $id)
  {
    print_r($req->all());
    $file = $req->file('file');
    $name = $file->getClientOriginalName(); 
    $image = Str::random(4) . "_" . $name;
    while (file_exists("./uploads/images/products/img/" . $image))
    {
      $image = Str::random(4) . "_" . $name;
    }
    $file->move("./uploads/images/products/img", $image);
    $req->image = $image;
    $productImg = new ProductImg();
    $productImg->product_id = $id;
    $productImg->image = $req->image = $image;
    $productImg->save();
  }
  public function delImg(Request $req)
  {
    $id         = $req->id;
    $img_del_qr = ProductImg::where('id', $id)->first();
    if ($img_del_qr->image !="") {
        if (file_exists('./uploads/images/products/img/' .$img_del_qr->image))
        {
            unlink('./uploads/images/products/img/' .$img_del_qr->image);
        }
    }
   ProductImg::destroy($id);
       
  }
  public function edit($id)
  {
    $dataPro = Product::find($id);
    $categoryController = new CategoryController();
    $data_select = $categoryController->getDataSelect(0, '', '');
    return view("admin.product.edit", compact("dataPro","data_select"));
  }
  public function update(Request $req, $id)
  {
    $product = Product::where('id',$id)->first();
    $product->name = $req->name;
    $product->category_id = $req->category_id;
    $product->description = $req->description;
    $product->content = $req->content;
    $product->infor = $req->infor;
    $price = (int)preg_replace("/[\,\.]+/", "", $req->price);
    $promotional_price = (int)preg_replace("/[\,\.]+/", "", $req->promotional_price);
    $product->price = $price;
    $product->promotional_price = $promotional_price;
    $product->sale = parent::sale($promotional_price, $price);
    $slug = Str::slug($req->name, '-');
    $product->url = $slug;
    $product->count = $req->stock;
    if ($req->hasFile('file'))
      {
          $file = $req->file('file');
          $name = $file->getClientOriginalName(); 
          $image = Str::random(4) . "_" . $name;
          while (file_exists("./uploads/images/products/" . $image))
          {
              $image = Str::random(4) . "_" . $name;
          }
          $file->move("./uploads/images/products", $image);
          $req->image = $image;
      }
    else
      {
          $req->image = $req->old_file;
      }
      $product->image = $req->image;
      $product->status = $req->has('status') ? '1' : '0';
      if ($product->save())
        {
            return redirect('admin/product/view-product')->with('flash_message_success', 'Bạn đã sửa thành công');
        }
      else
        {
            return redirect('admin/product/view-product')
                ->with('flash_message_error', 'Có lỗi xảy ra vui lòng thử lại');
        }
  }
  public function delete(Request $req)
  {
    $id         = $req->id;
    $img_del_qr = Product::where('id', $id)->first();
    if ($img_del_qr->image !="") {
        if (file_exists('./uploads/images/products/' .$img_del_qr->image))
        {
            unlink('./uploads/images/products/' .$img_del_qr->image);
        }
    }
   
    
    if (Product::destroy($id)) {
        $msg = [
            'status' => '_success',
            'msg'    => 'Xóa thành công.'
        ];
        return response()->json($msg);
    } else {
        $msg = [
            'status' => '_error',
            'msg'    => 'Error.'
        ];
        return response()->json($msg);
    }
  }
}
