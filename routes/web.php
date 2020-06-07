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

Route::get('/search', function() {
    return view('search');
});

Route::get('/comments', function() {
    return view('comments');
});

Route::get('/banned', function() {
    return view('banned');
});

Route::get('/blocked', function() {
    return view('blocked');
});

Route::get('/ban', function() {
    return view('ban');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
