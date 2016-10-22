<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAvaliacaoDisciplina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_disciplina', function (Blueprint $table) {
            $table->integer('avaliacao_id')->unsigned();
            $table->integer('disciplina_id')->unsigned();
            
            $table->primary(['avaliacao_id', 'disciplina_id']);

            $table->foreign('avaliacao_id')->references('id')->on('avaliacoes')
            ->onUpdate('cascade');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')
            ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao_disciplina');
    }
}
