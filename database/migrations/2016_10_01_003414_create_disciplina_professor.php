<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinaProfessor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplina_professor', function (Blueprint $table) {
                $table->integer('disciplina_id')->unsigned();
                $table->integer('professor_id')->unsigned();
                $table->primary(['disciplina_id','professor_id']);

                $table->foreign('disciplina_id')->references('id')->on('disciplinas')
                ->onUpdate('cascade');
                $table->foreign('professor_id')->references('id')->on('professores')
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
        Schema::dropIfExists('disciplina_professor');
    }
}
