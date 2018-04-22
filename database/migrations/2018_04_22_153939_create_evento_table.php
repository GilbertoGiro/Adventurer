<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('idcurso');
            $table->string('endereco');
            $table->integer('numero');
            $table->string('bairro');
            $table->string('complemento');
            $table->string('duracao');
            $table->string('flaberto');
            $table->string('flexterno');

            $table->foreign('idcurso')
                ->references('id')
                ->on('curso');

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
        Schema::dropIfExists('evento');
    }
}
