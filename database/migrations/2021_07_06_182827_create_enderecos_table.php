<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
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
            $table->integer('orgao_id')->unsigned()->nullable();
            $table->foreign('orgao_id')
            ->references('id')
            ->on('orgaos')
            ->onDelete('cascade');
            $table->string('logradouro', 150);
            $table->string('complemento', 50);
            $table->string('numEndereco', 10);
            $table->string('bairro', 60);
            $table->string('cidade', 60);
            $table->tinyInteger('uf');
            $table->integer('cep');
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
        Schema::dropIfExists('enderecos');
    }
}
