<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdQuestaoOrdem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordem_questao;', function (Blueprint $table) {
            $table->integer('questao_id')->unsigned();        
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
        Schema::table('ordem_questao;', function (Blueprint $table) {
            $table->dropColumn('questao_id');
        });
    }
}
