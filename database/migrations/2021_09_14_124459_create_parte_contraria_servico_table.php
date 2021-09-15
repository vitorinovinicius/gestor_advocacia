<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParteContrariaServicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parte_contraria_servico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parte_contraria_id')->unsigned();
            $table->integer('servico_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();

            $table->foreign('parte_contraria_id')
            ->references('id')
            ->on('partes_contrarias');

            $table->foreign('servico_id')
            ->references('id')
            ->on('servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parte_contraria_servico');
    }
}
