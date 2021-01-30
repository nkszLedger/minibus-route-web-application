<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilitaryVeteranFingerprintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('military_veteran_fingerprints', function (Blueprint $table) {
            $table->id();
            $table->integer('military_veteran_id');
            $table->binary('fingerprint_wsq')->nullable();
            $table->binary('fingerprint')->nullable();
            $table->string('comments')->nullable();
            $table->timestamps();

            $table->foreign('military_veteran_id')->references('id')->on('military_veterans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('military_veteran_fingerprints');
    }
}
