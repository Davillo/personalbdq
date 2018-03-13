<?php



Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('pages.index');
});


Route::get('/home', 'HomeController@index'); // referencia o HomeController e o método Index

Route::get('/login', 'HomeController@login'); // referencia o HomeController e o método Index

Route::post('/login', 'HomeController@efetuarLogin'); // referencia o HomeController e o método Index


