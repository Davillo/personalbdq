<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaListaQuestao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_questao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->string('descricao',255);
            $table->integer('autor_usuario_id')->unsigned();
            $table->foreign('autor_usuario_id')->references('id')->on('usuario');
            $table->timestamps();


            // $table->integer('curso_id')->unsigned();
            //$table->foreign('curso_id')->references('id')->on('curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
