<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_class', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_type_id');
            $table->string('make');
            $table->string('model');
            $table->string('year')->nullable();
            $table->integer('seats_number')->nullable();
            $table->timestamps();

            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_class');
    }
}
