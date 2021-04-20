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


Route::middleware(['headers'])->group(function () {
    Route::get('/', 'HomeController@index');

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

//    Route::get('/resetPassword', 'Auth\ResetController@showResetForm')->name('password.reset');
//    Route::post('/resetPassword', 'Auth\ResetController@resetPassword');
});


Route::middleware(['headers', 'auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('info', 'Auth\ResetController@showInfo')->name('info.show');
//    Route::get('info/edit', 'Auth\ResetController@editInfo')->name('info.edit');
//    Route::patch('info/change', 'Auth\ResetController@updateInfo')->name('info.update');

    Route::get('/friends/index', 'FriendController@index')->name('friends.index');
    Route::post('/friends/add/{id}', 'FriendController@add')->name('friends.add');
    Route::post('/friends/remove/{id}', 'FriendController@remove')->name('friends.remove');
    Route::post('/friends/accept/{id}', 'FriendController@accept')->name('friends.accept');
    Route::post('/friends/reject/{id}', 'FriendController@reject')->name('friends.reject');
    Route::post('/friends/cancel/{id}', 'FriendController@cancel')->name('friends.cancel');
});

