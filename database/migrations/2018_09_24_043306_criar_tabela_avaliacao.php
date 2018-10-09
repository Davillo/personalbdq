<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAvaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable(true);
            $table->string('instituicao')->nullable(true);
            $table->string('logo')->nullable(true);
            $table->string('professor')->nullable(true);
            $table->string('curso')->nullable(true);
            $table->string('disciplina')->nullable(true);
            $table->string('turma')->nullable(true);
            $table->string('avaliacao')->nullable(true);
            $table->string('instrucao')->nullable(true);
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
        //
    }
}
