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


Route::get('/home', 'HomeController@index'); // referencia o HomeController e o método Index

Route::get('/login', 'HomeController@login'); // referencia o HomeController e o método Index

Route::post('/login', 'HomeController@efetuarLogin'); // referencia o HomeController e o método Index



