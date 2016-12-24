<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cria2rTabelaAlunoQuestao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_questao', function (Blueprint $table) {
            $table->integer('aluno_id')->unsigned();
            $table->integer('questao_id')->unsigned();

            $table->foreign('aluno_id')->references('id')->on('alunos')
            ->onUpdate('cascade');            

            $table->foreign('questao_id')->references('id')->on('questoes')
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
        Schema::dropIfExists('aluno_questao');
    }
}
