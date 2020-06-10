<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) 
        {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('employee_number')->unique();
            $table->string('id_number')->unique();
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_relationship');
            $table->string('emergency_contact_number');
            $table->string('address_line');
            $table->string('surburb');
            $table->string('postal_code');
            $table->integer('city_id');
            $table->integer('province_id');
            $table->integer('region_id');
            $table->timestamps();

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
        Schema::dropIfExists('employees');
    }
}
