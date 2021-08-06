<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissaoPessoaFisicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissao_pessoa_fisica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_fisica_id')->unsigned();
            $table->integer('profissao_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('pessoa_fisica_id')
            ->references('id')
            ->on('pessoas_fisicas')
            ->onDelete('cascade');
            $table->foreign('profissao_id')
            ->references('id')
            ->on('profissoes')
            ->onDelete('cascade');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('profissao_pessoa_fisica');
    }
}
