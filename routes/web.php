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

Route::get('/', 'HomeController@Index')->name('index');
Route::get('/home', 'HomeController@Index');


Auth::routes();

Route::get('/channels', 'ChannelController@index')->name('channelsList');
Route::get('/admin/create/channel', 'ChannelController@create')->middleware('admin')->name('createNewChannel');
Route::post('/admin/create/channel', 'ChannelController@store')->middleware('admin')->name('createNewChannelPost');

Route::get('/threads/create', 'ThreadsController@create')->name('createNewThread')->middleware('auth');
Route::post('/threads/create', 'ThreadsController@store')->name('createNewThreadPost')->middleware('auth');
Route::get('/threads/{channel}', 'ThreadsController@index');
Route::get('/threads/{channel}/{thread}', 'ThreadsController@show');
Route::delete('/threads/{channel}/{thread}', 'ThreadsController@destroy')->middleware('auth');

Route::post('/threads/{channel}/{thread}/reply', 'RepliesController@store');
Route::patch('/replies/{reply}', 'RepliesController@update');
Route::delete('/replies/{reply}', 'RepliesController@destroy');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');