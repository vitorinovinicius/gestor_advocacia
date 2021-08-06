<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamentoPessoaFisicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamento_pessoa_fisica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoaFisica_id')->unsigned();
            $table->integer('tratamento_id')->unsigned();
            $table->foreign('pessoaFisica_id')
            ->references('id')
            ->on('pessoas_fisicas')
            ->onDelete('cascade');
            $table->foreign('tratamento_id')
            ->references('id')
            ->on('tratamentos')
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
        Schema::dropIfExists('tratamento_pessoa_fisica');
    }
}
