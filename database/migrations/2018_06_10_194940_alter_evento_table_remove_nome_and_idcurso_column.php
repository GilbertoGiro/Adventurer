<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventoTableRemoveNomeAndIdcursoColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evento', function(Blueprint $table){
           $table->dropColumn('nome');
           $table->dropColumn('idcurso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evento', function(Blueprint $table){
            $table->string('nome');
            $table->integer('idcurso');

            $table->foreign('idcurso')
                ->references('id')
                ->on('curso');
        });
    }
}
