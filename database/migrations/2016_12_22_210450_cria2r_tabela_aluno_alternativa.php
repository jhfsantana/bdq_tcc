<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cria2rTabelaAlunoAlternativa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_alternativa', function (Blueprint $table) {
            $table->integer('aluno_id')->unsigned();
            $table->integer('alternativa_id')->unsigned();

            $table->foreign('aluno_id')->references('id')->on('alunos')
            ->onUpdate('cascade');            

            $table->foreign('alternativa_id')->references('id')->on('alternativas')
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
        Schema::dropIfExists('aluno_alternativa');
    }
}
