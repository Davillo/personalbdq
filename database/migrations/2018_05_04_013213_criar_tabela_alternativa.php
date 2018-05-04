<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAlternativa extends Migration
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
            $table->string('enunciado',255);
            $table->boolean('correta');
            $table->integer('questao_id')->unsigned();
            $table->foreign('questao_id')->references('id')->on('questao');
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
        Schema::dropIfExists('alternativa');
    }
}
