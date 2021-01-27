<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->integer( 'district_id' );
            $table->integer( 'region_id' );	
            $table->string( 'district_code' );	
            $table->integer( 'gauteng_reference_number' );	
            $table->integer( 'emis_number' );
            $table->string( 'institution_name' );	
            $table->string( 'inst_level_budgetary_requirements' );
            $table->integer( 'level_id' );
            $table->string( 'data_year' );
            $table->integer( 'type_of_institution_id' );
            $table->string( 'relation_with_state' )->nullable();
            $table->integer( 'sector_id' )->nullable();
            $table->string( 'circuit_no' )->nullable();	
            $table->string( 'cluster_no' )->nullable();
            $table->string( 'quintile' )->nullable();	
            $table->string( 'no_fee' )->nullable();
            $table->string( 'street_number' )->nullable();
            $table->string( 'street_name' )->nullable();
            $table->string( 'township_village' )->nullable();
            $table->string( 'suburb' )->nullable();
            $table->integer( 'town_city_id' );
            $table->string( 'telephone' )->nullable();
            $table->string('email')->nullable();
            $table->string( 'sub_place_name' )->nullable();	
            $table->string( 'main_place_name' )->nullable();

            $table->integer( 'metropolitan_municipality_id' );
            $table->integer( 'local_municipality_id' );
            $table->string( 'ward_number' );

            $table->string( 'latitude' )->nullable();
            $table->string( 'longitude' )->nullable();

            /* school-grade counts */
            $table->integer( 'pre_grade_r' )->default(0);	
            $table->integer( 'pre_grade_r_classes' )->default(0);	
            $table->integer( 'grade_r' )->default(0);	
            $table->integer( 'grade_r_classes' )->default(0);	
            $table->integer( 'grade_1' )->default(0);
            $table->integer( 'grade_1_classes' )->default(0);	
            $table->integer( 'grade_2' )->default(0);	
            $table->integer( 'grade_2_classes' )->default(0);	
            $table->integer( 'grade_3' )->default(0);
            $table->integer( 'grade_3_classes' )->default(0);	
            $table->integer( 'grade_4' )->default(0);	
            $table->integer( 'grade_4_classes' )->default(0);	
            $table->integer( 'grade_5' )->default(0);	
            $table->integer( 'grade_5_classes' )->default(0);	
            $table->integer( 'grade_6' )->default(0);	
            $table->integer( 'grade_6_classes' )->default(0);	
            $table->integer( 'grade_7' )->default(0);
            $table->integer( 'grade_7_classes' )->default(0);	
            $table->integer( 'grade_8' )->default(0);
            $table->integer( 'grade_8_classes' )->default(0);	
            $table->integer( 'grade_9' )->default(0);	
            $table->integer( 'grade_9_classes' )->default(0);	
            $table->integer( 'grade_10' )->default(0);
            $table->integer( 'grade_10_classes' )->default(0);
            $table->integer( 'grade_11' )->default(0);	
            $table->integer( 'grade_11_classes' )->default(0);	
            $table->integer( 'grade_12' )->default(0);	
            $table->integer( 'grade12_classes' )->default(0);	
            $table->integer( 'special' )->default(0);	
            $table->integer( 'special_classes' )->default(0);	
            $table->integer( 'other' )->default(0);	
            $table->integer( 'other_classes' )->default(0);	
            $table->integer( 'total_learners' )->default(0);	
            $table->integer( 'total_classes' )->default(0);	
            $table->integer( 'paid_by_sgb_educators' )->default(0);
            $table->integer( 'paid_by _state_educators' )->default(0);
            $table->integer( 'total_educators' )->default(0);	
            $table->integer( 'admin_staff' )->default(0);	
            $table->integer( 'support_staff' )->default(0);
            $table->integer( 'professional_non_teaching_staff' )->default(0);
            $table->softDeletes()->nullable();	

            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('region_id')->references('region_id')->on('regions');
            $table->foreign('level_id')->references('id')->on('school_levels');
            $table->foreign('type_of_institution_id')->references('id')->on('school_types');
            $table->foreign('town_city_id')->references('city_id')->on('city');
            $table->foreign('metropolitan_municipality_id')->references('id')->on('metropolitan_municipalities');
            $table->foreign('local_municipality_id')->references('municipality_id')->on('local_municipalities');


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
        Schema::dropIfExists('schools');
    }
}
