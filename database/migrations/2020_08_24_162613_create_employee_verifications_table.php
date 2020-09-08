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
        Schema::create('employee_verifications', function (Blueprint $table) 
        {
            $table->id();
            $table->integer('employee_id');

            $table->boolean('association_approved')->default(0);
            $table->boolean('letter_issued')->default(0);
            $table->boolean('letter_signed')->default(0);

            $table->nullableTimestamps();
            $table->softDeletes()->nullable();

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
