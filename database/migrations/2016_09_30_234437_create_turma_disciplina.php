<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmaDisciplina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma_disciplina', function (Blueprint $table) {
            $table->integer('turma_id')->unsigned();
            $table->integer('disciplina_id')->unsigned();
            $table->primary(['turma_id', 'disciplina_id']);

            $table->foreign('turma_id')->references('id')->on('turmas')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('turma_disciplina');
    }
}
