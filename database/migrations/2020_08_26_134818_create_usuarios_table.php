<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('usr_codigo', 250);
            $table->string('usr_nome', 250);
            $table->string('usr_funcao', 150);
            $table->string('usr_senha',250);
            $table->boolean('usr_bloqueado');
            $table->string('usr_telefone', 11);
            $table->string('usr_email', 150);
            $table->integer('und_codigo');
            $table->integer('set_codigo');
            $table->integer('niv_codigo');
            //Primary Key
            $table->primary('usr_codigo');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
