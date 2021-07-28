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
            $table->string('situacao');
            $table->string('tipo');
            $table->date('publicacao');
            $table->text('descricao');
            $table->date('inicial');
            $table->time('hora');
            $table->time('final');
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
