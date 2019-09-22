<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get', 'post'], '/admin','Backend\Auth\LoginController@login')->name('login');

Route::group(['middleware' => ['auth']],function(){
	Route::get('/admin/dashboard','Backend\HomeController@dashboard')->name('dashboard');
	Route::get('/admin/settings','Backend\HomeController@settings');
	Route::get('/admin/check-pwd','Backend\HomeController@chkPassword');
	Route::match(['get','post'],'/admin/update-pwd','Backend\Auth\LoginController@updatePassword');
    Route::get('admin/logout','Backend\Auth\LoginController@logout')->name('logout');

	// Categories Routes (Admin)
	Route::match(['get','post'],'/admin/add-category','Backend\CategoryController@addCategory');
	Route::match(['get','post'],'/admin/edit-category/{id}','Backend\CategoryController@editCategory');
	Route::match(['get','post'],'/admin/delete-category/{id}','Backend\CategoryController@deleteCategory');
	Route::get('/admin/view-categories','Backend\CategoryController@viewCategories');

	// Products Routes
	Route::match(['get','post'],'/admin/add-product','Backend\ProductsController@addProduct');
	Route::get('/admin/view-products','Backend\ProductsController@viewProducts');
});

Route::get('/', 'Frontend\HomeController@index')->name('home');


