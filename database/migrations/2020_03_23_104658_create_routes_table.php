<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->integer('region_id'); //TODO our own table id
            $table->integer('association_id');
            $table->integer('route_id')->unique();
            $table->string('origin');
            $table->string('via');
            $table->string('destination');

            $table->timestamps();

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
        Schema::dropIfExists('routes');
    }
}
