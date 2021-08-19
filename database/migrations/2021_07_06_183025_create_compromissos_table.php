<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompromissosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compromissos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('processo_id')->unsigned()->nullable();
            $table->foreign('processo_id')
            ->references('id')
            ->on('processos')
            ->onDelete('cascade');
            $table->integer('servico_id')->unsigned()->nullable();
            $table->foreign('servico_id')
            ->references('id')
            ->on('servicos')
            ->onDelete('cascade');
            $table->string('situacao')->nullable();
            $table->string('tipo')->nullable();
            $table->date('publicacao')->nullable();
            $table->text('descricao')->nullable();
            $table->date('inicial')->nullable();
            $table->time('hora')->nullable();
            $table->time('final')->nullable();
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
        Schema::dropIfExists('compromissos');
    }
}
