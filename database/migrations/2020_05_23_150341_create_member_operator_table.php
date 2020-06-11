<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberOperatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_operator', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('license_number')->unique();
            $table->string('membership_number')->unique();
            $table->string('license_path')->nullable();
            $table->date('valid_since')->nullable();
            $table->date('valid_until')->nullable();
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_operator');
    }
}
