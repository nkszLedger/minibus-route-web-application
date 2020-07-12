<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('type_id');
            $table->double('longitude', 15, 8);
            $table->double('latitude', 15, 8);
            $table->integer('municipality_id');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('facility_type');
            $table->foreign('municipality_id')->references('id')->on('facility_municipality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility');
    }
}
