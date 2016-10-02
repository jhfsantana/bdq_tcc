<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinaTurma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplina_turma', function (Blueprint $table) {
            $table->integer('disciplina_id')->unsigned();
            $table->integer('turma_id')->unsigned();
            
            $table->primary(['disciplina_id', 'turma_id']);

            $table->foreign('disciplina_id')->references('id')->on('disciplinas')
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
        Schema::dropIfExists('disciplina_turma');
    }
}
