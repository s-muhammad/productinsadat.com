<?php
Route::get('/', function () {return view('admin.index');});

Route::resource('users','user\UserController');
Route::resource('roles','RoleController');
Route::resource('products','ProductController');
Route::resource('permissions','PermissionController');
Route::resource('comments','CommentController')->only('index','update','destroy');
Route::resource('categories','CategoryController');
Route::resource('orders','OrderController');
Route::resource('product.gallery','ProductGalleryController');
Route::resource('colors','ColorController');
Route::resource('sizes','SizeController');
Route::resource('setting','SettingController')->only('index','update','edit');
Route::resource('about','AboutController')->only('index','update','edit');
Route::resource('slider','SliderController');
Route::resource('banner','BannerController');

Route::get('orders/{order}/orders','OrderController@payments')->name('orders.payments');
Route::get('/users/{user}/permissions','user\PermissionController@create')->name('users.permissions')->middleware('can:staff-user-permissions');
Route::post('/users/{user}/permissions','user\PermissionController@store')->name('users.permissions.store')->middleware('can:staff-user-permissions');
Route::post('attribute/values','AttributeController@getValues')->name('attribute.values');
Route::get('comments/unapproved','CommentController@unapproved')->name('comments.unapproved');
