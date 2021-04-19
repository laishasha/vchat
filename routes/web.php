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

Route::get('/', 'HomeController@index');

Route::middleware(['headers'])->group(function () {
    // show login form
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    // handle login request
    Route::post('/login', 'Auth\LoginController@login');
    // handle logout request
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    // show registration form
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    // handle registration request
    Route::post('/register', 'Auth\RegisterController@register');
});


Route::middleware(['headers, auth'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
    });

