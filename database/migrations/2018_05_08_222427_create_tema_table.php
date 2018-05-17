<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tema', function(Blueprint $table){
            $table->increments('id');
            $table->string('titulo');
            $table->text('descricao');
            $table->string('nmusuario');
            $table->string('email');
            $table->integer('idcurso');
            $table->string('sttema', 3)->default('abe');
            $table->integer('idusuario');
            $table->integer('idresponsavel')->nullable();

            $table->foreign('idcurso')
                ->references('id')
                ->on('curso');

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
        Schema::dropIfExists('tema');
    }
}
