<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_organizations', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('regional_coordinator_full_name')->nullable();
            $table->string('regional_coordinator_contact_details')->nullable();
            $table->integer('association_id');
            $table->integer('facility_taxi_rank_id');
            $table->string('facility_manager_full_name')->nullable();
            $table->string('facility_manager_contact_details')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('facility_taxi_rank_id')->references('id')->on('facility');
            $table->foreign('association_id')->references('association_id')->on('association');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_organizations');
    }
}
