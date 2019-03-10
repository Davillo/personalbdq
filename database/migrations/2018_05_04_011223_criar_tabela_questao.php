<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaQuestao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questao', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('enunciado');
            $table->string('palavras_chave',150);
            $table->string('categoria',30);
            $table->string('tipo',30);
            $table->string('dificuldade',30);
            $table->longText('resposta')->nullable();
            $table->integer('quantidadeLinhas')->nullable();
            $table->integer('autor_usuario_id')->unsigned();
            $table->date('data_criacao');
            $table->date('data_atualizado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questao');
    }
}
