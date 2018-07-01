<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaUsuariosListas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_listas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_convidado_id')->unsigned();
            $table->foreign('usuario_convidado_id')->references('id')->on('usuario');

            $table->integer('lista_id')->unsigned();
            $table->foreign('lista_id')->references('id')->on('lista_questao');

            $table->integer('autor_usuario_id')->unsigned();
            $table->foreign('autor_usuario_id')->references('id')->on('usuario');

            $table->date('data_criacao');
            $table->date('data_atualizado');
            //$table->timestamps();
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
