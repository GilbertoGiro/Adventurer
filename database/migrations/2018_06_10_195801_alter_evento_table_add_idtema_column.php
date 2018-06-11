<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventoTableAddIdtemaColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evento', function(Blueprint $table){
            $table->integer('idtema');

            $table->foreign('idtema')
                ->references('id')
                ->on('tema');
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
            $table->dropForeign('evento_idtema_foreign');
            $table->dropColumn('idtema');
        });
    }
}
