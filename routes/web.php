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

//Route::get('/ropa', 'RopaController@index');

//Route::get('/ropa/create', 'RopaController@create');

/*Route::get('/ropa/edit', function () {
    return view('ropa.edit');
});*/

Route::resource('ropa', 'RopaController');