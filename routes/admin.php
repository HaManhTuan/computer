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
    Route::post('addCategory', 'CategoryController@addCate');\
    Route::get('edit-category/{id}', 'CategoryController@edit');
    Route::post('editCategory/{id}', 'CategoryController@editCate');
    // Route::post('edit-modal', 'CategoryController@editModal');
    // Route::post('edit', 'CategoryController@edit');
    Route::post('delete', 'CategoryController@delete');
    // Route::post('change-status', 'CategoryController@changestatus');
    // Route::post('changeSort', 'CategoryController@changeSort');
  });
});
?>