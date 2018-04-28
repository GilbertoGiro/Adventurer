<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecuperacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recuperacao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idusuario');
            $table->string('token');
            $table->string('flutilizado', 1)->nullable();

            $table->foreign('idusuario')
                ->references('id')
                ->on('usuario');

            // Laravel Timestamps
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
        Schema::dropIfExists('recuperacao');
    }
}
