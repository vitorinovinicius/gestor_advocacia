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
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('parte_contraria_id')->unsigned()->nullable();

            $table->integer('user_id')->unsigned()->nullable();

            $table->string('cpf', 14)->unique()->nullable();
            $table->string('pis', 14)->unique()->nullable();
            $table->string('profissao', 100)->nullable();
            $table->string('estadoCivil', 30)->nullable();
            $table->enum('sexo', ['Masculino', 'Feminino'])->nullable();
            $table->string('tratamento', 50)->nullable();
            $table->string('numCtps', 7)->unique()->nullable();
            $table->string('serieCtps', 5)->nullable();
            $table->string('ufCtps', 2)->nullable();
            $table->string('nacionalidade', 100)->nullable();
            $table->string('codMatricula', 10)->nullable();
            $table->date('dtNascimento')->nullable();
            $table->string('tituloEleitor', 19)->unique()->nullable();
            $table->string('idtCivil', 13)->unique()->nullable();
            $table->string('orgExpeditor', 60)->nullable();
            $table->date('dtExpedicao')->nullable();
            $table->string('nomeMae', 150)->nullable();
            $table->timestamps();

            $table->foreign('parte_contraria_id')
            ->references('id')
            ->on('partes_contrarias')
            ->onDelete('cascade');

            $table->foreign('cliente_id')
            ->references('id')
            ->on('clientes')
            ->onDelete('cascade');
            
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
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
