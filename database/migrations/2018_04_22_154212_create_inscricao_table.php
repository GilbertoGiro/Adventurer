<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idusuario');
            $table->integer('idevento');
            $table->string('stinscricao');
            $table->text('motivorecusa');

            $table->foreign('idusuario')
                ->references('id')
                ->on('usuario');

            $table->foreign('idevento')
                ->references('id')
                ->on('evento');

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
        Schema::dropIfExists('inscricao');
    }
}
