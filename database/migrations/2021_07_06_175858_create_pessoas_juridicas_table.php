<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasJuridicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas_juridicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('parte_contraria_id')->unsigned()->nullable();
            $table->string('numero', 19)->nullable();
            $table->string('inscMunicipal')->nullable();
            $table->string('inscEstadual')->nullable();
            $table->integer('codigo')->nullable();
            $table->timestamps();
                        
            $table->foreign('parte_contraria_id')
            ->references('id')
            ->on('partes_contrarias')
            ->onDelete('cascade');
            $table->foreign('cliente_id')
            ->references('id')
            ->on('clientes')
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
        Schema::dropIfExists('pessoas_juridicas');
    }
}
