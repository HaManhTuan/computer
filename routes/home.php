<?php 
//home
Route::get('/', 'HomeController@index');
Route::get('/danh-muc/{slug}', 'HomeController@category');
Route::get('/danh-muc/{slug}/{val}', 'HomeController@categoryfilter');
Route::get('/chi-tiet/{slug}', 'HomeController@detail');
//Gio hang
Route::get('/gio-hang', 'HomeController@cart');
Route::post('/cart/add-to-cart', 'HomeController@addCart');
Route::post('/cart/updateCart', 'HomeController@updateCart');
Route::post('/removeCart', 'HomeController@removeCart');
//Checkout
Route::get('/thanh-toan', 'HomeController@checkout');
Route::post('/thanhtoan', 'HomeController@finish');
Route::get('/thanks', 'HomeController@thanks');





 ?>