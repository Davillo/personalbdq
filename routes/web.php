<?php





Route::get('/', 'HomeController@index'); // Rota root

Route::get('/home', 'HomeController@home'); // dashboard

Route::get('/edit', 'UsuarioController@edit'); // dashboard

Route::post('/login', 'HomeController@efetuarLogin'); // rota de login POST

Route::get('/usuario/excluir/{id}','UsuarioController@destroy'); //deletar usuário GET

Route::get('/usuario','UsuarioController@show'); //rota listar usuários GET

Route::get('/logout','HomeController@logout'); // rota logout GET

Route::post('/usuario/inserir','UsuarioController@store'); // rota cadastro usuário POST



