<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Datas;

class CriarTabelaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->boolean('admin')->default(false);
            $table->string('email',100);
            $table->string('senha',100);
            $table->string('matricula',40);
            $table->date('data_criacao');
            $table->date('data_atualizado');
            $table->string('remember_token', 100)->nullable();

        });

        DB::table('usuario')->insert(
            array(
                'email' => 'admin@admin.com',
                'nome' => 'admin',
                'senha'=> bcrypt('admin'),
                'admin' => 1,
                'matricula'=> 'Não possui',
                'data_criacao' => Datas::getDataAtual(),
                'data_atualizado' => Datas::getDataAtual()
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
