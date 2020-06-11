<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_driver', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->integer('driving_licence_code_id');
            $table->string('license_number')->unique();
            $table->date('valid_since')->nullable();
            $table->date('valid_until')->nullable();
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('driving_licence_code_id')->references('id')
                                                ->on('driving_licence_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_driver');
    }
}
