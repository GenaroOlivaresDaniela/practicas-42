<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optativas', function (Blueprint $table) {
            $table->id();
            $table->string('materia');
            $table->unsignedBigInteger('maestro_id')->unsigned();
            $table->unsignedBigInteger('alumno_id')->unsigned();

            $table->foreign('maestro_id')->references('id')->on('docentes');
            $table->foreign('alumno_id')->references('id')->on('alumnos'); 
          
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('optativas');
    }
};
