<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoaFisica_id')->unsigned();
            $table->foreign('pessoaFisica_id')
            ->references('id')
            ->on('pessoas_fisicas')
            ->onDelete('cascade');
            $table->string('tipo_Prof');
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
        Schema::dropIfExists('profissoes');
    }
}
