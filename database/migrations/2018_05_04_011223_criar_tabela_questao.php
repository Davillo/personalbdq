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
            $table->string('enunciado',255);
            $table->string('categoria',30);
            $table->string('tipo',10);
            $table->string('dificuldade',20);
            $table->integer('autor_usuario_id')->unsigned();
            $table->integer('lista_questao_id')->unsigned();
            $table->foreign('autor_usuario_id')->references('id')->on('usuario');
            $table->foreign('lista_questao_id')->references('id')->on('lista_questao');
            $table->timestamps();
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
