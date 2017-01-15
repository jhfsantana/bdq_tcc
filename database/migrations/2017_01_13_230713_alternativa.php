<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alternativa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternativas', function (Blueprint $table) {
            $table->string('alternativa_marcaada');
            $table->integer('aluno_id')->unsigned();
            $table->integer('avaliacao_id')->unsigned();
            $table->integer('questao_id')->unsigned();

            $table->foreign('aluno_id')->references('id')->on('alunos')
            ->onUpdate('cascade');            

            $table->foreign('avaliacao_id')->references('id')->on('avaliacoes')
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
        Schema::dropIfExists('alternativas');
    }
}
