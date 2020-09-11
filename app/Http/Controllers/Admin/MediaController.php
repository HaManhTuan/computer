<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Model\Media;
class MediaController extends Controller
{
  public function add()
    {
      return view("admin.media.add");
    }
  public function addMedia(Request $req)
    {
      $media = new Media();
      $media->name = $req->name;
      $media->position = $req->position;
      if ($req->hasFile('file')) {
          $file  = $req->file('file');
          $name  = $file->getClientOriginalName();
          $image = Str::random(4)."_".$name;
          while (file_exists("./uploads/images/media/".$image)) {
              $image = Str::random(4)."_".$name;
          }
          $file->move("./uploads/images/media", $image);
          $media->image = $image;
      } else {
          $media->image = "";
      }
      $query = $media->save();
      if ($query)
      {
          
          return redirect('admin/media/add-media')->with('flash_message_success', 'Bạn đã thêm mới 1 hình ảnh');
      }
      else
      {
          return redirect('admin/media/add-media')->with('flash_message_error', 'Lỗi. Vui lòng thử lại sau');
      }
    }
  public function view()
    {
      $media = Media::all();
      return view('admin.media.list', compact('media'));
    }
  public function edit($id)
    {
      $detailMed = Media::where('id',$id)->first();
      return view('admin.media.edit', compact('detailMed'));
    }
  public function editMedia(Request $req, $id)
    {
      $detailMed = Media::where('id',$id)->first();
      $detailMed->name = $req->name;
      $detailMed->position = $req->position;
      $target_save = "./uploads/images/media/";
      if ($req->hasFile('file'))
      {
          $file = $req->file('file');
          $name = $file->getClientOriginalName();
          $image = Str::random(4) . "_" . $name;
          while (file_exists("./uploads/images/media/" . $image))
          {
              $image = Str::random(4) . "_" . $name;
          }
          $file->move("public/uploads/images/media", $image);
           $detailMed->image  = $image;
          if (file_exists($req->old_file) && $req->old_file != '')
          {
              unlink("./uploads/images/media/" . $req->old_file);
          }

      }
      else
      {
          $detailMed->image = $req->old_file;
      }
      if ($detailMed->save())
      {
          return redirect('admin/media/view-media')->with('flash_message_success', 'Bạn đã sửa thành công');
      }
      else
      {
          return redirect('admin/media/view-media')
              ->with('flash_message_error', 'Có lỗi xảy ra vui lòng thử lại');
      }
    }
  public function delete(Request $req)
      {
        $id         = $req->id;
        $img_del_qr = Media::where('id', $id)->first();
        if (file_exists('./uploads/images/media/' . $img_del_qr->image))
        {
            unlink('./uploads/images/media/' . $img_del_qr->image);
        }
        if (Media::destroy($id)) {
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
