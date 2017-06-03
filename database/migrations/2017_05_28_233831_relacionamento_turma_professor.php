<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoTurmaProfessor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_turma', function (Blueprint $table) {
            $table->integer('professor_id')->unsigned();
            $table->integer('turma_id')->unsigned();
            $table->primary(['professor_id','turma_id']);
            $table->foreign('professor_id')->references('id')->on('professores')
            ->onUpdate('cascade');
            $table->foreign('turma_id')->references('id')->on('turmas')
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
        Schema::dropIfExists('professor_turma');
    }
}
