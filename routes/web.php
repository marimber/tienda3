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

Route::get('/', 'PostController@index');

Route::get('/posts/create', 'PostController@create')->name('create');

Route::post('/posts', 'PostController@store');

Route::get('/posts/myposts', 'UserController@posts')->name('myposts');


Route::get('/post/{id}', 'PostController@show')->name('posts');

Route::post('comments', 'CommentController@store');

Auth::routes();

Route::get('/home', 'PostController@index')->name('home');

Route::delete('/post/{id}', 'PostController@destroy' )->name('destroy');

Route::get('users/{id}/edit', 'UserController@edit')->name('edit');

Route::resource('users', 'UserController');


Route::get('user', 'PostController@showuser')->name('edita');

Route::post('update', 'UserController@update')->name('update');

Route::get('userdestroy', 'UserController@destroy')->name('userdestroy');
