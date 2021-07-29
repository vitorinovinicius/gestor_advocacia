<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas_fisicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')
            ->references('id')
            ->on('clientes')
            ->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
            $table->string('cpf', 15)->unique();
            $table->string('pis', 15)->unique()->nullable();
            $table->enum('sexo', ['M', 'F']);
            $table->string('numCtps')->unique();
            $table->string('serieCtps');
            $table->string('nacionalidade');
            $table->string('codMatricula');
            $table->date('dtNascimento');
            $table->string('tituloEleitor')->unique();
            $table->string('idtCivil')->unique();
            $table->date('dtExpedicao');
            $table->string('orgExpeditor');
            $table->string('nomeMae');
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
        Schema::dropIfExists('pessoas_fisicas');
    }
}
