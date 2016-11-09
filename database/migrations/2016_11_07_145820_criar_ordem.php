<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarOrdem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_questao;', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_questao');

            $table->integer('avaliacao_id')->unsigned();        
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
        Schema::dropIfExists('ordem_questao;');
    }
}
