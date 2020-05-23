<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberRegionAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_region_associations', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->integer('association_id');
            $table->integer('region_id');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('region_id')->references('region_id')->on('regions');
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
        Schema::dropIfExists('member_region_associations');
    }
}
