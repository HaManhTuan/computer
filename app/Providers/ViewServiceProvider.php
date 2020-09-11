<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Category;
class ViewServiceProvider extends ServiceProvider
{
    public function get_menu_data($parent_id = 0, $type = '', $status = 1) {
        $category  = Category::orderBy('created_at', 'asc')->get()->toArray();
        $menu_data = [];
        foreach ($category as $category_item) {
            if ($category_item['parent_id'] == $parent_id) {
                $cate_status = $category_item['status'];
                if ($status = $cate_status) {
                    $menu_data[] = $category_item;
                }
            }
        }
        if ($menu_data && count($menu_data) > 0) {
            foreach ($menu_data as $key => $item) {
                // Đệ quy cấp con của danh mục
                $data_child               = $this->get_menu_data($item['id']);
                $menu_data[$key]['child'] = $data_child;
            }
        }
        return $menu_data;
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $menu_data = $this->get_menu_data(0, "", 1);
        $data_send = ['menu_data' => $menu_data];
        view()->share($data_send);
    }
}
