<?php

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| Here is where you can register public routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "public" middleware group. Now create something great!
|
*/

Route::get('/', [
	'uses' => 'PostController@index',
	'as' => 'posts.index'
]);

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('posts/{post}-{slug}', [
	'as' => 'posts.show',
	'uses' => 'PostController@show'
])->where('post', '\d+');