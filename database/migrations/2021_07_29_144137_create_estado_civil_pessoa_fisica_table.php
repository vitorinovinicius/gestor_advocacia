<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoCivilPessoaFisicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_civil_pessoa_fisica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoaFisica_id')->unsigned();
            $table->integer('estado_civil_id')->unsigned();
            $table->foreign('pessoaFisica_id')
            ->references('id')
            ->on('pessoas_fisicas')
            ->onDelete('cascade');
            $table->foreign('estado_civil_id')
            ->references('id')
            ->on('estados_civis')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_civil_pessoa_fisica');
    }
}
