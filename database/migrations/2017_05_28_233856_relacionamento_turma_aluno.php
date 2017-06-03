<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoTurmaAluno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_turma', function (Blueprint $table) {
            $table->integer('aluno_id')->unsigned();
            $table->integer('turma_id')->unsigned();
            $table->primary(['aluno_id','turma_id']);
            $table->foreign('aluno_id')->references('id')->on('alunos')
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
        Schema::dropIfExists('aluno_turma');
    }
}
