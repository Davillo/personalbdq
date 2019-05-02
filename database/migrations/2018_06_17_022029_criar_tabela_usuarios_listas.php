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
            $table->integer('lista_id')->unsigned();
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
        //
    }
}
