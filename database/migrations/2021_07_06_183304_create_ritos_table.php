<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ritos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('processo_id')->unsigned();
            $table->foreign('processo_id')
            ->references('id')
            ->on('processos')
            ->onDelete('cascade');
            $table->string('tipo_Rito');
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
        Schema::dropIfExists('ritos');
    }
}
