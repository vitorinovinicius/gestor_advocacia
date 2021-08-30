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

            $table->integer('parte_contraria_id')->unsigned()->nullable();

            $table->integer('user_id')->unsigned()->nullable();

            $table->integer('orgao_id')->unsigned()->nullable();

            $table->string('logradouro', 150)->nullable();
            $table->string('complemento', 50)->nullable();
            $table->string('numEndereco', 10)->nullable();
            $table->string('bairro', 60)->nullable();
            $table->string('cidade', 60)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('cep', 9)->nullable();
            $table->timestamps();

            $table->foreign('cliente_id')
            ->references('id')
            ->on('clientes')
            ->onDelete('cascade');

            $table->foreign('parte_contraria_id')
            ->references('id')
            ->on('partes_contrarias')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('orgao_id')
            ->references('id')
            ->on('orgaos')
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
        Schema::dropIfExists('enderecos');
    }
}
