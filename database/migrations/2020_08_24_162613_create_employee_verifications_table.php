<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_verifications', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->boolean('association_approved');
            $table->boolean('letter_issued');
            $table->boolean('letter_signed');
            $table->nullableTimestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_verifications');
    }
}
