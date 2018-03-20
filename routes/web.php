<?php

// Usuário
Route::get('/novo_usuario','UsuarioController@novo');
Route::get('/edit/{id}', 'UsuarioController@edit');
Route::get('/usuario','UsuarioController@show'); //rota listar usuários GET
Route::get('/usuario/excluir/{id}','UsuarioController@destroy'); //deletar usuário GET
Route::post('/usuario/inserir','UsuarioController@store'); // rota cadastro usuário POST


//Home requests
Route::get('/logout','HomeController@logout'); // rota logout GET
Route::get('/', 'HomeController@index'); // Rota root
Route::get('/home', 'HomeController@home');
Route::post('/login', 'HomeController@efetuarLogin'); // rota de login POST



//Curso
Route::get('/novo_curso', 'CursoController@novo');
Route::get('/curso','CursoController@show');
Route::get('/curso/edit/{id}','CursoController@edit');
Route::post('/curso/inserir','CursoController@inserir');
Route::get('/curso/excluir/{id}','CursoController@destroy'); //deletar curso GET












