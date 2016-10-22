<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentooAvaliacaoTurma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_turma', function (Blueprint $table) {
            $table->integer('avaliacao_id')->unsigned();
            $table->integer('turma_id')->unsigned();
            $table->primary(['avaliacao_id', 'turma_id']);

            $table->foreign('avaliacao_id')->references('id')->on('avaliacoes')
            ->onUpdate('cascade');
            $table->foreign('turma_id')->references('id')->on('turmas')
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
        Schema::dropIfExists('avaliacao_turma');
    }
}
