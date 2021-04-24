<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');

Route::post('/login', 'Admin\LoginController@login')->name('admin.login.post');




// Route::get('/{path}', function () {
//     return view('admin.admin_master');
// });



Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/', function(){
        return view('admin.admin_master');
    })->name('admin.dashboard');

    Route::get('user', function () {
        return response()->json([
            'admin' => \Auth::guard('admin')->user(),
        ], 200);
    });

    //CategoryController
    Route::resource('category', 'CategoryController');
    Route::post('/multiple-category-delete','CategoryController@mutipleDelete')->name('admin.category.multipledelete');
     Route::get('all-category', 'CategoryController@getAllCategory')->name('admin.allcategory');
     Route::get('all-brand', 'BrandController@getAllBrand')->name('admin.allbrand');
    //Brand Controller
    Route::resource('brand', 'BrandController');
    Route::post('/multiple-brand-delete','BrandController@mutipleDelete')->name('admin.brand.multipledelete');


    //logout controller
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

    //user Controller
    Route::get('user-list', 'HomeController@userList')->name('admin.user.list');

    //product route
    Route::resource('product', 'ProductController');
    Route::post('/multiple-product-delete','ProductController@mutipleDelete')->name('admin.product.multipledelete');



});




Route::get('/{path}', function () {
    return view('admin.admin_master');
});


