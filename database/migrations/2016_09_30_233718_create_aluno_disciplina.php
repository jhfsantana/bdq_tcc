<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoDisciplina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_disciplina', function (Blueprint $table) {
            $table->integer('aluno_id')->unsigned();
            $table->integer('disciplina_id')->unsigned();
            $table->primary(['aluno_id', 'disciplina_id']);

            $table->foreign('aluno_id')->references('id')->on('alunos')
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
        Schema::dropIfExists('aluno_disciplina');
    }
}
