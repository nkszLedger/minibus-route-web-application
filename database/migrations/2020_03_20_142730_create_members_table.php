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
            $table->string('license_number')->unique();
            $table->string('email')->nullable();
            $table->string('address_line_one');
            $table->string('address_line_two')->nullable();
            $table->unsignedBigInteger('membership_type_id');
            $table->integer('association_id');
            $table->integer('region_id');

            $table->timestamps();

            $table->foreign('membership_type_id')->references('id')->on('membership_types');
            $table->foreign('association_id')->references('association_id')->on('association');
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
        Schema::dropIfExists('members');
    }
}
