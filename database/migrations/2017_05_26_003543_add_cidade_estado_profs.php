<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCidadeEstadoProfs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('professores', function (Blueprint $table) {
           $table->string('uf');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('logradouro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('professores', function (Blueprint $table) {
            //
        });
    }
}
