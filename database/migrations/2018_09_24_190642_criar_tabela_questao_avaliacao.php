<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaQuestaoAvaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questao_avaliacao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questao_id')->unsigned();
            $table->integer('avaliacao_id')->unsigned();
   //         $table->foreign('questao_id')->references('id')->on('questao');
         //   $table->foreign('avaliacao_id')->references('id')->on('avaliacao');
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
