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

Route::group(['prefix' => '/'], function () {
  //frontend route
  route::get('/', 'FrontendController@index')->name('/');
  route::get('resume', 'FrontendController@resume')->name('resume');
  route::get('portofolio', 'FrontendController@portofolio')->name('portofolio');
  route::get('portofolio/detail/{slug}', 'FrontendController@portofolioDetail')->name('detail-portofolio');
  route::get('contact', 'FrontendController@contact')->name('contact');
});

// Route::get( '/', [
//     'uses' => 'AuthController@goToAdminLoginPage',
//     'as'   => 'admin.login'
//   ]);

Route::group(['prefix' => 'auth-portofolio'], function () {
  //admin login route
  Route::get( '/', [
    'uses' => 'AuthController@goToAdminLoginPage',
    'as'   => 'admin.login'
  ]);
  Route::post( 'post-login' , [
    'uses' => 'AuthController@postAdminLogin',
    'as'   => 'admin.post_login'
  ]);  
  //admin logout route
  Route::post( 'logout', [
    'uses' => 'AuthController@logoutFromLogin',
    'as'   => 'admin.logout'
  ]);

  Route::get('register', [
    'uses' => 'AuthController@registration',
    'as'   => 'admin.register'
  ]);

  Route::post('register', [
    'uses' => 'AuthController@userRegistration',
    'as'   => 'admin.post_register'
  ]);
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
	route::get('products', 'DashboardController@index')->name('products');
	route::get('products/{id}', 'DashboardController@productsUpdate')->name('update-products');
	route::post('products/{id}', 'DashboardController@saveProducts')->name('save-products');
  route::get('products/details/{id}', 'DashboardController@productsDetails')->name('view-products');

  route::get('category', 'DashboardController@category')->name('category');
  route::get('category/{id}', 'DashboardController@categoryUpdate')->name('update-category');
  route::post('category/{id}', 'DashboardController@saveCategory')->name('save-category');

  route::get('portofolio', 'DashboardController@portofolio')->name('portofolio-list');
  route::get('portofolio/{id}', 'DashboardController@portofolioUpdate')->name('update-portofolio');
  route::post('portofolio/{id}', 'DashboardController@savePortofolio')->name('save-portofolio');

  route::get('resume', 'DashboardController@resume')->name('resume-list');
  route::get('resume/{id}', 'DashboardController@resumeUpdate')->name('update-resume');
  route::post('resume/{id}', 'DashboardController@saveResume')->name('save-resume');

  route::post('upload-related-image', 'AjaxController@saveRelatedImage')->name('upload-related-image');
});

Route::post('/ajax/delete-item', 'AjaxController@selectedItemDeleteById')->name('selected-item-delete');
