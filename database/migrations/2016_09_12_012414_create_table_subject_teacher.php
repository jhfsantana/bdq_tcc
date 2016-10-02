<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubjectTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_teacher', function (Blueprint $table) {
                
                $table->integer('teacher_id')->unsigned();
                $table->integer('subject_id')->unsigned();
                $table->primary(['subject_id','teacher_id']);

                $table->foreign('subject_id')->references('id')->on('subjects')
                ->onUpdate('cascade');
                $table->foreign('teacher_id')->references('id')->on('teachers')
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
        Schema::dropIfExists('subject_teacher');
    }
}
