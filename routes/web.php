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
Route::get('/', 'GuestsController@index');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::post('/posts/deleted/{post}/restore', 'PostsController@restore');
Route::get('/posts/deleted', 'PostsController@deleted')->name('posts.deleted');
Route::resource('posts', 'PostsController');
