<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city')->unique();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('country');
            $table->string('iso2')->nullable();
            $table->string('admin')->nullable();
            $table->string('capital')->nullable();
            $table->string('population')->nullable();
            $table->string('population_proper')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
