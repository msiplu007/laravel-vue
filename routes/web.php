


<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', function () {
    return view('public.public_master');
});


Route::prefix('admin')->group(base_path('routes/admin.php'));
Route::prefix('user')->group(base_path('routes/user.php'));




Auth::routes();
Route::get('user-login', 'HomeController@index')->name('login');





Route::get('/home', 'HomeController@index')->name('home');



Route::get('/', function () {
    return view('public.public_master');
});

Route::get('/{path}', function () {
    return view('public.public_master');
});
