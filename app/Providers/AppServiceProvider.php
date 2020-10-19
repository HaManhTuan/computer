<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Category;
use App\Model\Media;
use App\Model\Page;
use App\Model\Config;
use Cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
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
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $cart_data = Cart::getContent();
            $cart_subtotal = Cart::getSubTotal();
            $count_cart = $cart_data->count();
            $menu_data = $this->get_menu_data(0, "", 1);
            $media_center = Media::where('position',1)->get();
            $media_right = Media::where('position',2)->get();
            $page = Page::all();
            $dataConfig = Config::find(1);
            $data_send = ['menu_data' => $menu_data,'media_center' => $media_center,'media_right' => $media_right, 'page' => $page,'cart_data' => $cart_data,'count_cart' => $count_cart,'cart_subtotal' => $cart_subtotal, 'dataConfig' => $dataConfig];
            $view->with($data_send);
        });
    }
}
