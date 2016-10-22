<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionarChaveDisciplinaTabelaAvaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('avaliacoes', function (Blueprint $table) {
            $table->integer('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('avaliacoes', function (Blueprint $table) {
            $table->dropColumn('disciplina_id');
        });
    }
}
