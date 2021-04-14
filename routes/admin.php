<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');

Route::post('/login', 'Admin\LoginController@login')->name('admin.login.post');





Route::get('/{path}', function () {
    return view('admin.admin_master');
});


Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/', function(){
        return view('admin.admin_master');
    })->name('admin.dashboard');

    Route::get('user', function () {
        return response()->json([
            'admin' => \Auth::guard('admin')->user(),
        ], 200);
    });

    Route::resource('category', 'CategoryController');

    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');
});
