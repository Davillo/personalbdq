<?php

// Usuário
Route::get('/novo_usuario','UsuarioController@novo');
Route::get('/edit/{id}', 'UsuarioController@edit');
Route::get('/usuario','UsuarioController@show'); //rota listar usuários GET
Route::delete('/usuario/excluir/{id}','UsuarioController@destroy'); //deletar usuário GET
Route::post('/usuario/inserir','UsuarioController@store'); // rota cadastro usuário POST
Route::post('/usuario/update','UsuarioController@update');

//Home requests
Route::get('/logout','HomeController@logout'); // rota logout GET
Route::get('/', 'HomeController@index'); // Rota root
Route::get('/home', 'HomeController@home');
Route::post('/login', 'HomeController@efetuarLogin'); // rota de login POST
Route::post('/contato','HomeController@contato'); // rota de salvar contato

//Curso
Route::get('/novo_curso', 'CursoController@novo');
Route::get('/curso','CursoController@show');
Route::get('/curso/edit/{id}','CursoController@edit');
Route::delete('/curso/excluir/{id}','CursoController@destroy'); //deletar curso GET
Route::post('/curso/inserir','CursoController@inserir');
Route::post('/curso/update','CursoController@update');

//Lista
Route::get('/nova_lista', 'ListaController@nova');
Route::get('/listas','ListaController@show');
Route::get('/lista/edit/{id}','ListaController@edit');
Route::delete('/lista/excluir/{id}','ListaController@destroy'); //deletar curso GET
Route::post('/lista/inserir','ListaController@store');
Route::post('/lista/update','ListaController@update');
Route::get('lista/{id}','ListaController@lista');

//Lista compartilhada
Route::get('lista/compartilhar/{id}','ListaController@share');
Route::post('/lista/compartilhar','ListaController@compartilharLista');
Route::get('/listas/compartilhadas/','ListaController@listasCompartilhadas');
Route::get('/lista/compartilhada/{id}','ListaController@listaCompartilhada');
Route::get('/lista/compartilhar/excluir/{id}','ListaController@excluirCompartilhada');
Route::get('/lista/clonar/{id}','ListaController@clonarLista');

//Questão
Route::get('/nova_questao', 'QuestaoController@nova_vindo_questoes');
Route::get('/nova_questao/{id}', 'QuestaoController@nova');
Route::get('/questao/edit/{id}/{lista_id}', 'QuestaoController@edit');
Route::get('/questao/edit/{id}', 'QuestaoController@editarQuestao');
Route::post('/questao/update', 'QuestaoController@update');
Route::post('/questao/inserir', 'QuestaoController@store');
Route::get('/questoes', 'QuestaoController@show');
Route::delete('/questao/excluir/{id}','QuestaoController@destroy');
Route::get('/questao/remover/{id}/{lista_id}', 'QuestaoController@removerQuestaoLista');
Route::post('/questao/fazerCopia','QuestaoController@fazerCopia');
Route::post('/questao/clonar','QuestaoController@clonarQuestao');
Route::post('/questao/comentario','QuestaoController@adicionarComentario');
Route::delete('/questao/comentario/excluir/{id}','QuestaoController@excluirComentario');

//Avaliações
Route::get('/avaliacoes', 'ListaController@avaliacoes');











