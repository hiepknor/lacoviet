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

	// Charts Routes
    Route::get('/admin/charts','Backend\HomeController@charts')->name('charts');
});


// Frontend
Route::get('/', ['as' => 'trang-chu', 'uses' => 'Frontend\HomeController@index']);

Route::get('trang-chu', ['as' => 'trang-chu', 'uses' => 'Frontend\HomeController@index']);

Route::get('gioi-thieu', ['as' => 'gioi-thieu', 'uses' => 'Frontend\AboutController@index']);

Route::get('san-pham', ['as' => 'san-pham', 'uses' => 'Frontend\ProductController@index']);

Route::get('tin-tuc', ['as' => 'tin-tuc', 'uses' => 'Frontend\NewsController@index']);

Route::get('hoat-dong', ['as' => 'hoat-dong', 'uses' => 'Frontend\EventController@index']);

Route::get('tuyen-si-dai-ly', ['as' => 'tuyen-si-dai-ly', 'uses' => 'Frontend\AgencyController@index']);

Route::get('lien-he', ['as' => 'lien-he', 'uses' => 'Frontend\ContactController@index']);

Route::get('san-pham/{categorySlug}', ['as' => 'danh-muc', 'uses' => 'Frontend\CategoryController@index']);

Route::get('san-pham/{categorySlug}/{productSlug}', ['as' => 'chi-tiet-san-pham', 'uses' => 'Frontend\ProductController@detail']);

Route::get('gio-hang', ['as' => 'gio-hang', 'uses' => 'Frontend\CartController@index']);

Route::get('them-gio-hang/{id}', ['as' => 'them-gio-hang', 'uses' => 'Frontend\CartController@addToCart']);

Route::patch('cap-nhat-gio-hang', ['as' => 'cap-nhat-gio-hang', 'uses' => 'Frontend\CartController@updateCart']);

Route::delete('xoa-gio-hang', ['as' => 'xoa-gio-hang', 'uses' => 'Frontend\CartController@removeCart']);

Route::get('thanh-toan', ['as' => 'thanh-toan', 'uses' => 'Frontend\CheckoutController@index']);

Route::post('luu-don-hang', ['as' => 'luu-don-hang', 'uses' => 'Frontend\CheckoutController@saveOrder']);

Route::get('saveOrder', ['as' => 'dat-hang-thanh-cong', 'uses' => 'Frontend\CheckoutController@saveOrder']);