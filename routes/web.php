<?php

// Usuário
Route::get('/novo_usuario','UsuarioController@novo');//formulario para criacao de novo usuario
Route::get('/edit/{id}', 'UsuarioController@edit');// formulario de edicao de usuario
Route::get('/usuario','UsuarioController@show'); //rota listar usuários GET
Route::delete('/usuario/excluir/{id}','UsuarioController@destroy'); //deletar usuário GET
Route::post('/usuario/inserir','UsuarioController@store'); // rota cadastro usuário POST
Route::post('/usuario/update','UsuarioController@update');//rota atualizadcao usuario POST
Route::get('/usuario/verificarEmail/{email}', 'UsuarioController@verificarEmail');//rota verificar email existente


//handlers
Route::get('404', ['as' => '404', 'uses' => 'HomeController@notfound']); // 404, rotas invalidas
Route::get('500', ['as' => '500', 'uses' => 'HomeController@servererror']);

//Home requests
Route::get('/logout','HomeController@logout'); // rota logout GET
Route::get('/', 'HomeController@index'); // Rota root
Route::get('/home', 'HomeController@home');// rota inicial, dashboard
Route::post('/login', 'HomeController@efetuarLogin'); // rota de login POST
Route::post('/contato','HomeController@contato'); // rota de salvar contato

//Curso
Route::get('/novo_curso', 'CursoController@novo');
Route::get('/curso','CursoController@show');
Route::get('/curso/edit/{id}','CursoController@edit');
Route::delete('/curso/excluir/{id}','CursoController@destroy'); //deletar curso DELETE
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
Route::get('/nova_questao', 'QuestaoController@nova_vindo_questoes');// formulario cadastro de questoes
Route::get('/nova_questao/{id}', 'QuestaoController@nova');//form para cadastrar questao
Route::get('/questao/edit/{id}/{lista_id}', 'QuestaoController@edit'); // formulario editar questão de lista
Route::get('/questao/edit/{id}', 'QuestaoController@editarQuestao');//formulario para editar questao 
Route::post('/questao/update', 'QuestaoController@update');//formulario POST para atualizar questao
Route::post('/questao/inserir', 'QuestaoController@store');//Post para salvar Questao
Route::get('/questoes', 'QuestaoController@show'); // View de lista de questoes
Route::delete('/questao/excluir/{id}','QuestaoController@destroy');// rota DELETE para exclusão de questões
Route::delete('/questao/remover/{id}/{lista_id}', 'QuestaoController@removerQuestaoLista');//rota Delete para exclusão de questões da lista
Route::post('/questao/fazerCopia','QuestaoController@fazerCopia');//POST para efetuar copia de questao
Route::post('/questao/clonar','QuestaoController@clonarQuestao');//  envio post para clonar questao
Route::post('/questao/comentario','QuestaoController@adicionarComentario');// post para cadastrar comentario
Route::delete('/questao/comentario/excluir/{id}','QuestaoController@excluirComentario'); // delete para exclusão de comentario

//Avaliações
Route::get('/avaliacoes', 'AvaliacaoController@avaliacoes');
Route::get('/nova_avaliacao', 'AvaliacaoController@nova_avaliacao');
Route::post('/avaliacao/inserir', 'AvaliacaoController@store');
Route::get('/avaliacao/{id}', 'AvaliacaoController@avaliacao');
Route::delete('/avaliacao/questao/remover/{id}/{avaliacao_id}', 'AvaliacaoController@removerQuestaoAvaliacao');
Route::get('/avaliacao/edit/{id}', 'AvaliacaoController@editarAvaliacao');
Route::post('/avaliacao/update', 'AvaliacaoController@update');
Route::delete('/avaliacao/excluir/{id}', 'AvaliacaoController@destroy');
Route::get('/avaliacao/adicionar/{id}', 'AvaliacaoController@adicionarQuestoes');
Route::post('/avaliacao/addQuestoes', 'AvaliacaoController@storeQuestoesAvaliacao');
Route::get('/avaliacao/gerarpdf/{id}', 'AvaliacaoController@gerarPdf');
Route::get('/avaliacao/gerargabarito/{id}', 'AvaliacaoController@gerarGabarito');










