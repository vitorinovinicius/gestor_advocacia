<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaturezasJuridicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naturezas_juridicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_juridica_id')->unsigned();
            $table->foreign('pessoa_juridica_id')
            ->references('id')
            ->on('pessoas_juridicas')
            ->onDelete('cascade');
            $table->string('tipo', 60)->nullable();
            $table->string('sigla', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('naturezas_juridicas');
    }
}
