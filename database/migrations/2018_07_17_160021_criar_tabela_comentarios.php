<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('comentario');
            $table->integer('questao_id')->unsigned();
            $table->foreign('questao_id')->references('id')->on('questao')->onDelete('cascade');
            $table->integer('autor_usuario_id')->unsigned();
            $table->foreign('autor_usuario_id')->references('id')->on('usuario');
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
        Schema::dropIfExists('comentarios');
    }
}
