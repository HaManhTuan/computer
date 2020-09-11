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
  //Media
  Route::group(['prefix' => 'media', 'middleware' => 'Admin'], function () {
    Route::get('view-media', 'MediaController@view');
    Route::get('add-media', 'MediaController@add');
    Route::post('addMedia', 'MediaController@addMedia');\
    Route::get('edit-media/{id}', 'MediaController@edit');
    Route::post('editMedia/{id}', 'MediaController@editMedia');
    Route::post('delete', 'MediaController@delete');
    

  });
});
?>