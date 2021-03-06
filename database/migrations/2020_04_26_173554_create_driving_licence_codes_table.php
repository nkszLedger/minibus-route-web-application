<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrivingLicenceCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driving_licence_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->longText('class')->nullable();
            $table->longText('category')->nullable();
            $table->longText('includes')->nullable();
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
        Schema::dropIfExists('driving_licence_codes');
    }
}
