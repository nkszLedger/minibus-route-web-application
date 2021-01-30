<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilitaryVeteranPortraitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('military_veteran_portraits', function (Blueprint $table) {
            $table->id();
            $table->integer('military_veteran_id');
            $table->binary('portrait')->nullable();
            $table->timestamps();
            $table->foreign('military_veteran_id')->references('id')->on('military_veterans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('military_veteran_portraits');
    }
}
