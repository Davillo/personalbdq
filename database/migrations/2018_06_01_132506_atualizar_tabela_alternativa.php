<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AtualizarTabelaAlternativa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternativa', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('enunciado');
            $table->boolean('correta');
            $table->integer('questao_id')->unsigned();
            //$table->foreign('questao_id')->references('id')->on('questao')->onDelete('cascade');
          //  $table->integer('questao_id')->references('id')->on('questao')->onDelete('cascade');
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
        Schema::dropIfExists('alternativa');
    }
}
