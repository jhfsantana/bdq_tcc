<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarPontoQuestao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponto_questao', function (Blueprint $table) {
            $table->integer('ponto_id')->unsigned();        
            $table->integer('questao_id')->unsigned();            
            
            $table->primary(['ponto_id', 'questao_id']);

            $table->foreign('ponto_id')->references('id')->on('pontos')
            ->onUpdate('cascade');
            $table->foreign('questao_id')->references('id')->on('questao_id')
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
        Schema::dropIfExists('ponto_questao');
    }
}
