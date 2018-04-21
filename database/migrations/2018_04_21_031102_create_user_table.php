<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 200);
            $table->string('email', 200);
            $table->string('senha', 200);
            $table->integer('idcurso');
            $table->integer('idpapel');
            $table->string('flemail', 1);
            $table->string('calendia', 1);
            $table->string('calensem', 1);
            $table->string('calenmes', 1);
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
        Schema::dropIfExists('user');
    }
}
