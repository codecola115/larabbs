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

Route::get('/', 'PagesController@root')->name('root');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');

Route::resource('categories', 'CategoriesController', ['only' => ['show']]);
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');
