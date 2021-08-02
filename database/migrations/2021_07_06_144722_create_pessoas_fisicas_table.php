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
            $table->string('numCtps', 6)->unique();
            $table->string('serieCtps', 10);
            $table->string('nacionalidade', 100);
            $table->string('codMatricula', 10);
            $table->date('dtNascimento');
            $table->string('tituloEleitor', 16)->unique();
            $table->string('idtCivil', 10)->unique();
            $table->date('dtExpedicao');
            $table->string('orgExpeditor', 100);
            $table->string('nomeMae', 150);
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
