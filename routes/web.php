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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/profile/{user}', 'ProfileController@show');
Route::get('/threads','ThreadController@index');
Route::get('/threads/{channel}','ThreadController@index');
Route::get('/threads/{channel}/{thread}','ThreadController@show');
Route::delete('/threads/{channel}/{thread}','ThreadController@destroy')->name('delete');
Route::get('/thread','ThreadController@create');
Route::post('/thread','ThreadController@store');
Route::post('/threads/{channel}/{thread}/replies','ReplyController@store');
Route::post('/replies/{reply}/favorite','FavoriteController@store');

Route::delete('/replies/{reply}','ReplyController@destroy');
Route::patch('/replies/{reply}','ReplyController@update');

