<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilitaryVeteransDelegatedSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('military_veterans_delegated_schools', function (Blueprint $table) {
            $table->id();
            $table->integer('military_veteran_id');
            $table->integer('school_id');
            $table->timestamps();
            $table->softDeletes()->nullable();

            $table->foreign('military_veteran_id')->references('id')->on('military_veterans');
            $table->foreign('school_id')->references('emis_number')->on('schools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('military_veterans_delegated_schools');
    }
}
