<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAvaliacaoQuestao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_questao', function (Blueprint $table) {
            $table->integer('avaliacao_id')->unsigned();
            $table->integer('questao_id')->unsigned();
            
            $table->primary(['avaliacao_id', 'questao_id']);

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
        Schema::dropIfExists('avaliacao_questao');
    }
}
