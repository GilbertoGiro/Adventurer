<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterInscricaoTableAddNomeAndEmailAndFlalunoColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscricao', function (Blueprint $table) {
            $table->string('flaluno', 3)->nullable()->after('id');
            $table->string('email')->nullable()->after('id');
            $table->string('nome')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscricao', function (Blueprint $table) {
            $table->dropColumn('flaluno');
            $table->dropColumn('email');
            $table->dropColumn('nome');
        });
    }
}
