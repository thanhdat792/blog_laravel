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
    return view('welcome');
});

Route::get('/posts', 'PostController@index')->name('home');
Route::post('/posts/create', 'PostController@create');
Route::post('/posts/loadMore', 'PostController@loadMore');
// comment route config
Route::post('/comments/addComment', 'CommentController@addComment');
// auth route config
Auth::routes();

