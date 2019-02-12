<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaQuestaoLista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questao_listas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questao_id')->unsigned();
            $table->integer('lista_id')->unsigned();
           // $table->foreign('questao_id')->references('id')->on('questao');
          //  $table->integer('questao_id');
            //$table->foreign('lista_id')->references('id')->on('lista_questao');
          //  $table->integer('lista_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    //    Schema::dropIfExists('questao_lista');
    }
}
