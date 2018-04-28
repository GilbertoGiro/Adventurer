<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 200);
            $table->string('email', 200);
            $table->string('senha', 200);
            $table->integer('idcurso')->nullable();
            $table->integer('idpapel');
            $table->string('flemail', 1)->default('s');
            $table->string('calendia', 1)->default('s');
            $table->string('calensem', 1)->default('s');
            $table->string('calenmes', 1)->default('s');
            $table->string('flexterno', 1);

            $table->foreign('idcurso')
                ->references('id')
                ->on('curso');

            $table->foreign('idpapel')
                ->references('id')
                ->on('papel');

            // Laravel Timestamps
            $table->softDeletes();
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
        Schema::dropIfExists('usuario');
    }
}
