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

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('/post/create', 'PostsController@create');
Route::post('/post', 'PostsController@store');

Route::get('/search', 'SearchesController@index');
Route::get('/search/posts', 'SearchesController@posts');
Route::get('/search/users', 'SearchesController@users');

Route::get('/comments/{id}', 'CommentsController@index');

Route::get('/banned', function() {
    return view('banned');
});

Route::get('/blocked', function() {
    return view('blocked');
});

Route::get('/ban', function() {
    return view('ban');
});

Route::get('/following', function() {
    return view('following');
});

Route::get('/followers', function() {
    return view('followers');
});

Route::get('/edit', function() {
    return view('edit');
});

Route::get('/edit/{user}', 'EditController@edit');
Route::patch('/edit/{user}', 'EditController@update');

Route::get('/profile', function() {
    return view('profile');
});

Route::get('profile/{user}', 'ProfileController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
