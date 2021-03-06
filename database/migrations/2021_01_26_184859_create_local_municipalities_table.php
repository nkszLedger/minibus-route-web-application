<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_municipalities', function (Blueprint $table) {
            
            $table->integer('municipality_id')->primary();
            $table->string('name');
            $table->integer('metropolitan_municipality_id');
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->foreign('metropolitan_municipality_id')->references('id')->on('metropolitan_municipalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local_municipalities');
    }
}
