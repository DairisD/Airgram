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

Route::view('/', 'welcome');

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('/post/create', 'PostsController@create');
Route::post('/post', 'PostsController@store');

Route::get('/search', 'SearchesController@index');
Route::get('/search/posts', 'SearchesController@posts');
Route::get('/search/users', 'SearchesController@users');
Route::post('/search/{image}', 'SearchesController@delete');

Route::get('/comments/{id}', 'CommentsController@index');
Route::post('/comments/{id}', 'CommentsController@create');
Route::post('/comments/delete/{post}/{id}', 'CommentsController@delete');


Route::get('/banned', function() {
    return view('banned');
});

Route::get('/blocked', function() {
    return view('blocked');
});

Route::get('blocked', 'BlockController@index')->name('blocked');
Route::patch('blocked', 'BlockController@edit');
Route::post('blocked', 'BlockController@search');


Route::get('/following/{user}', 'FollowingController@index');
Route::get('/followers/{user}', 'FollowersController@index');
Route::get('banned', 'BannedController@index')->name('banned');

Route::patch('banned', 'BannedController@edit');
Route::post('banned', 'BannedController@search');

Route::get('/edit', function() {
    return view('edit');
});

Route::get('/edit/{user}', 'EditController@edit');
Route::patch('/edit/{user}', 'EditController@update');

Route::get('/profile', function() {
    return view('profile');
});

Route::post('profile/{user}/{image}', 'ProfileController@remove');
Route::get('profile/{user}', 'ProfileController@index')->name('profile');
Route::patch('profile/{user}', 'ProfileController@store')->name('follow'); 
Route::post('profile/{user}', 'ProfileController@delete')->name('unfollow'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/{post}', 'HomeController@remove');

Route::post('/votepos/{user}/{image}', 'VotesController@inc');
Route::post('/voteneg/{user}/{image}', 'VotesController@dec');
