<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('processo_id')->unsigned()->nullable();
            $table->foreign('processo_id')
            ->references('id')
            ->on('processos')
            ->onDelete('cascade');
            $table->string('nome')->nullable();
            $table->integer('numero')->nullable();
            $table->string('vara')->nullable();
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
        Schema::dropIfExists('orgaos');
    }
}
