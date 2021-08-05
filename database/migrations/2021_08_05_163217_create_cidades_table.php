<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ac', 100)->nullable();
            $table->string('al', 100)->nullable();
            $table->string('am', 100)->nullable();
            $table->string('ap', 100)->nullable();
            $table->string('ba', 100)->nullable();
            $table->string('ce', 100)->nullable();
            $table->string('df', 100)->nullable();
            $table->string('es', 100)->nullable();
            $table->string('go', 100)->nullable();
            $table->string('ma', 100)->nullable();
            $table->string('mg', 100)->nullable();
            $table->string('ms', 100)->nullable();
            $table->string('mt', 100)->nullable();
            $table->string('pa', 100)->nullable();
            $table->string('pr', 100)->nullable();
            $table->string('pb', 100)->nullable();
            $table->string('pe', 100)->nullable();
            $table->string('pi', 100)->nullable();
            $table->string('rj', 100)->nullable();
            $table->string('rn', 100)->nullable();
            $table->string('rs', 100)->nullable();
            $table->string('ro', 100)->nullable();
            $table->string('rr', 100)->nullable();
            $table->string('sc', 100)->nullable();
            $table->string('sp', 100)->nullable();
            $table->string('se', 100)->nullable();
            $table->string('to', 100)->nullable();
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
        Schema::dropIfExists('cidades');
    }
}
