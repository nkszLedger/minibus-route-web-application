<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_vehicle', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->integer('vehicle_id');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('vehicle_id')->references('id')->on('vehicle');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_vehicle');
    }
}
