<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_subject', function (Blueprint $table) {
            $table->integer('classroom_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->primary(['subject_id','classroom_id']);

            $table->foreign('subject_id')->references('id')->on('subjects')
            ->onUpdate('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')
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
    
        Schema::dropIfExists('classroom_subject');
    
    }
}
