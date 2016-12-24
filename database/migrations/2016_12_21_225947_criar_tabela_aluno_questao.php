<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAlunoQuestao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_questao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aluno_id')->unsigned();
            $table->integer('avaliacao_id')->unsigned();
            $table->string('alternativa_marcada');
            $table->timestamps();

            $table->foreign('aluno_id')->references('id')->on('alunos')
            ->onUpdate('cascade');            

            $table->foreign('avaliacao_id')->references('id')->on('avaliacoes')
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
