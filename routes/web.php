<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {

    # Login Page
    Route::get('/login', 'Admin\AdminLoginController@login')->name('admin.login');

    # Login POST Page
    Route::post('/login', 'Admin\AdminLoginController@loginForm')->name('admin.login.submit');

    # Admin Dashboard
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

    # Admin Logout
    Route::post('/logout', 'Admin\AdminController@logout')->name('admin.logout');

});
