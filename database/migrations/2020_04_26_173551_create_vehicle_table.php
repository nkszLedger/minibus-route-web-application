<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_class_id');
            $table->longText('info')->nullable();
            $table->string('registration_number')->unique();
            $table->timestamps();
            $table->softDeletes()->nullable();

            $table->foreign('vehicle_class_id')->references('id')->on('vehicle_class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle');
    }
}
