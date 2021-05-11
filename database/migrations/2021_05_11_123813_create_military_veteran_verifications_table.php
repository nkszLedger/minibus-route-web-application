<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilitaryVeteranVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('military_veteran_verifications', function (Blueprint $table) {
            $table->id();
            $table->integer('military_veteran_id');

            $table->boolean('association_approved')->default(0);
            $table->boolean('letter_issued')->default(0);
            $table->boolean('letter_signed')->default(0);
            $table->boolean('banking_details_confirmed')->default(0);

            $table->nullableTimestamps();
            $table->softDeletes()->nullable();

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
        Schema::dropIfExists('military_veteran_verifications');
    }
}
