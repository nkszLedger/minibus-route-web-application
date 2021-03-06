<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('id_number')->unique();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relationship')->nullable();
            $table->string('emergency_contact_number')->nullable();
            $table->string('surburb');
            $table->string('address_line');
            $table->string('postal_code');
            $table->unsignedBigInteger('membership_type_id');
            $table->unsignedBigInteger('gender_id');
            $table->integer('city_id');
            $table->boolean('is_member_associated');
            $table->timestamps();
            $table->softDeletes()->nullable();

            $table->foreign('membership_type_id')->references('id')->on('membership_types');
            $table->foreign('city_id')->references('city_id')->on('city');
            $table->foreign('gender_id')->references('id')->on('genders');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
