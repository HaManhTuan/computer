<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Model\Category;
class CategoryController extends Controller
{
      // Đệ quy tuyến tính menu đa cấp dạng droplist
  public function getDataSelect($parent_id = 0, $char = '', $current_id = '')
      {
        $category_data = Category::orderBy('id', 'asc')->get();
        $data_select = "";
        foreach ($category_data as $category_item)
        {
            if ($category_item['parent_id'] == $parent_id)
            {
                if ($current_id != "")
                {
                    if ($category_item['id'] == $current_id || $category_item['parent_id'] == $current_id)
                    {
                        $selected = "selected='selected'";
                    }
                    else
                    {
                        $selected = "";
                    }
                }
                else
                {
                    $selected = "";
                }
                $data_select .= '<option value="' . $category_item['id'] . '" ' . $selected . '>';
                $data_select .= $char . $category_item['name'];
                $data_select .= '</option>';
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $data_select .= $this->getDataSelect($category_item['id'], $char . "|---", $current_id);
            }
        }
         return $data_select;
       }
  public function add()
      {
        $data_select = $this->getDataSelect(0);
        return view('admin.category.add', compact('data_select'));
      }
  public function addCate(Request $req)
      {
        $check_name = Category::where('name', $req->name)
            ->count();
        if ($check_name > 0)
        {
            return redirect('admin/category/add-category')->with('flash_message_error', 'Lỗi. Tên này đã tồn tại');
        }
        else
        {
            $category = new Category();
            $category->name = $req->name;
            $slug = Str::slug($req->name, '-');
            $category->slug = $slug;
            $category->parent_id = $req->parent_id;
            $category->description = $req->description;
           
            if ($req->hasFile('file')) {
                $file  = $req->file('file');
                $name  = $file->getClientOriginalName();
                $image = Str::random(4)."_".$name;
                while (file_exists("./uploads/images/category/".$image)) {
                    $image = Str::random(4)."_".$name;
                }
                $file->move("./uploads/images/category", $image);
                $category->image = $image;
            } else {
                $category->image = "";
            }
            $category->status = $req->input('status') ? '1' : '0';
            $query = $category->save();
            if ($query)
            {
                
                return redirect('admin/category/add-category')->with('flash_message_success', 'Bạn đã thêm mới 1 danh mục');
            }
            else
            {
                return redirect('admin/category/add-category')->with('flash_message_error', 'Lỗi. Vui lòng thử lại sau');
            }
        }
      }
  public function viewcate()
      {
        $dataCate = Category::with('categories')->orderBy('parent_id', 'asc')->get();
        return view('admin.category.list',compact('dataCate'));
      }
  public function edit($id)
      {
        $detailCate = Category::where('id',$id)->first();
        $data_select = $this->getDataSelect(0, '',$id);
        return view('admin.category.edit', compact('detailCate','data_select'));
      }
  public function editCate(Request $req, $id)
      {
        $detailCate = Category::where('id',$id)->first();
        $detailCate->name = $req->name;
        $slug = Str::slug($req->name, '-');
        $detailCate->slug = $slug;
        $detailCate->parent_id = $req->parent_id;
        $detailCate->description = $req->description;
        $detailCate->status = $req->has('status') ? '1' : '0';
        $target_save = "./uploads/images/category/";
        if ($req->hasFile('file'))
        {
            $file = $req->file('file');
            $name = $file->getClientOriginalName();
            $image = Str::random(4) . "_" . $name;
            while (file_exists("./uploads/images/category/" . $image))
            {
                $image = Str::random(4) . "_" . $name;
            }
            $file->move("public/uploads/images/category", $image);
             $detailCate->image  = $image;
            if (file_exists($req->old_file) && $req->old_file != '')
            {
                unlink("./uploads/images/category/" . $req->old_file);
            }

        }
        else
        {
            $detailCate->image = $req->old_file;
        }
        if ($detailCate->save())
        {
            return redirect('admin/category/view-category')->with('flash_message_success', 'Bạn đã sửa thành công');
        }
        else
        {
            return redirect('admin/category/view-category')
                ->with('flash_message_error', 'Có lỗi xảy ra vui lòng thử lại');
        }
      }
  public function delete(Request $req)
      {
        $id         = $req->id;
        $img_del_qr = Category::where('id', $id)->first();
        if (file_exists('./uploads/images/category/' . $img_del_qr->image))
        {
            unlink('./uploads/images/category/' . $img_del_qr->image);
        }
        if (Category::destroy($id)) {
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
