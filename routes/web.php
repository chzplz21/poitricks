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


Route::get('/', 'HomePage@getStarted');
Route::get('/about', 'NavController@about');
Route::get('/contact', 'ContactController@create');
Route::post('/contact', 'ContactController@store');

Route::get('/thank-you', 'NavController@thankYou');


Route::get('/tricks/{trick}', 'trickController@start');


