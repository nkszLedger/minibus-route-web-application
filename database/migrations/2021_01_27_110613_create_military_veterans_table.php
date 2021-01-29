<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilitaryVeteransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('military_veterans', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('id_number')->unique();
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('address_line');
            $table->string('surburb');
            $table->string('postal_code');
            $table->integer('city_id');
            $table->integer('province_id');
            $table->integer('gender_id');
            $table->integer('region_id');
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relationship')->nullable();
            $table->string('emergency_contact_number')->nullable();
            $table->string('region_leader_name')->nullable();
            $table->string('region_leader_contact_number')->nullable();
            $table->integer('number_of_delegated_schools');
            $table->timestamps();
            $table->softDeletes()->nullable();

            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('city_id')->references('city_id')->on('city');
            $table->foreign('region_id')->references('region_id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('military_veterans');
    }
}
