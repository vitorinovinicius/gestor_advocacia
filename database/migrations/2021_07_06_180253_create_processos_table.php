<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pasta', 300)->nullable();
            $table->string('numInicial')->nullable();
            $table->string('numPrincipal')->nullable();
            $table->string('numProcesso')->nullable();
            $table->date('ultAndamento')->nullable();
            $table->text('compromisso')->nullable();
            $table->string('instInicial')->nullable();
            $table->date('dtDistribuicao')->nullable();
            $table->string('advContrario')->nullable();
            $table->text('titulo')->nullable();
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
        Schema::dropIfExists('processos');
    }
}
