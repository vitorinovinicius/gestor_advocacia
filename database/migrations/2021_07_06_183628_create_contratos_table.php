<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('cliente_id')->unsigned()->nullable();            
            $table->integer('user_id')->unsigned()->nullable();           
            $table->integer('servico_id')->unsigned()->nullable();
            
            $table->string('numero')->nullable();
            $table->string('tipo')->nullable();
            $table->date('cadastro')->nullable();
            $table->date('assinatura')->nullable();
            $table->date('dtInicio')->nullable();
            $table->date('dtFim')->nullable();
            $table->string('valor')->nullable();
            $table->timestamps();

            $table->foreign('cliente_id')
            ->references('id')
            ->on('clientes')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('servico_id')
            ->references('id')
            ->on('servicos')
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
        Schema::dropIfExists('contratos');
    }
}
