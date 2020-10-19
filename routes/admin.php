<?php 
//Login
Route::get('admin/login', 'AdminController@login');
Route::post('admin/dang-nhap', 'AdminController@dangnhap');

Route::group(['prefix' => 'admin', 'middleware' => 'Admin'], function () {
  Route::get('dashboard', 'AdminController@dashboard');
  //Categories
  Route::group(['prefix' => 'category', 'middleware' => 'Admin'], function () {
    Route::get('view-category', 'CategoryController@viewcate');
    Route::get('add-category', 'CategoryController@add');
    Route::post('addCategory', 'CategoryController@addCate');
    Route::get('edit-category/{id}', 'CategoryController@edit');
    Route::post('editCategory/{id}', 'CategoryController@editCate');
    Route::post('delete', 'CategoryController@delete');
    //Page
    Route::post('addPage', 'CategoryController@addPage');
    Route::get('edit-page/{id}', 'CategoryController@editPage');
    Route::post('editPagePost/{id}', 'CategoryController@editPagePost');
    Route::post('upload', 'CategoryController@upload');
    Route::post('deletePage', 'CategoryController@deletePage');
  });
  //Products
  Route::group(['prefix' => 'product', 'middleware' => 'Admin'], function () {
     Route::get('view-product', 'ProductController@view');
     Route::get('add-product', 'ProductController@add');
     Route::get('edit-product/{id}', 'ProductController@edit');
     Route::post('editProduct/{id}', 'ProductController@update');
     Route::post('addProduct', 'ProductController@store');
     Route::post('uploadContent', 'ProductController@uploadContent');
     Route::post('uploadInfor', 'ProductController@uploadInfor');
     Route::post('delete', 'ProductController@delete');
     //Add-Images
     Route::get('view-productImg/{id}', 'ProductController@viewImg');
     Route::post('add-productImg/{id}', 'ProductController@addImg');
     Route::post('del-productImg', 'ProductController@delImg');
  });
  //Media
  Route::group(['prefix' => 'media', 'middleware' => 'Admin'], function () {
    Route::get('view-media', 'MediaController@view');
    Route::get('add-media', 'MediaController@add');
    Route::post('addMedia', 'MediaController@addMedia');\
    Route::get('edit-media/{id}', 'MediaController@edit');
    Route::post('editMedia/{id}', 'MediaController@editMedia');
    Route::post('delete', 'MediaController@delete');
  });
  //Orders
  Route::group(['prefix' => 'order', 'middleware' => 'Admin'], function () {
    Route::get('view', 'OrderController@view');
    Route::get('view-orderdetail/{id}', 'OrderController@detail');
    Route::post('change-status', 'OrderController@changeStatus');
    Route::post('log/{id}', 'OrderController@addNote');
    Route::get('invoice/{id}', 'OrderController@invoice');
  });
  //Config
  Route::group(['prefix' => 'config', 'middleware' => 'Admin'], function () {
    Route::get('view', 'ConfigController@view');
    Route::match(['get','post'],'edit-config', 'ConfigController@edit');
  });
});
?>