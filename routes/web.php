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

Auth::routes();

Route::get('/', 'Guest\GuestsController@index');                                        //index for guests
Route::get('/post-{id}', 'Guest\GuestsController@show');                                //view a particular post

Route::post('/posts/deleted/{post}/restore', 'Admin\PostsController@restore');          //restore posts deleted through soft delete
Route::get('/posts/deleted', 'Admin\PostsController@deleted')->name('posts.deleted');   //see what the (soft) deleted posts are
Route::resource('admin/posts', 'Admin\PostsController');                                //resource routes
