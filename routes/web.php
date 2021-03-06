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

Route::get('/', function () {
    return view('fronts.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sign-in', 'FrontSecurityController@sign_in');
Route::get('/sign-up', 'FrontSecurityController@sign_up');
Route::get('/forgot-password', 'FrontSecurityController@forget');
Route::get('/reset', 'FrontSecurityController@reset');

// Admin Route
Route::prefix('nana-admin')->group(function () {
    Route::get('/', "DashboardController@index");

    Route::get('login', function(){
        return redirect('/login');
    });
    Route::get('logout', "UserController@logout");
    
    Route::get('dashboard', "DashboardController@index");

    Route::get('users', function () {
        
        return view('layouts.app');
    });
});