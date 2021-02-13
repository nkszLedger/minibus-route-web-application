<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('bank_id');
            $table->string('branch_name');
            $table->integer('branch_code');
            $table->integer('account_number')->unique();
            $table->string('account_holder');
            $table->integer('bank_account_type_id');
            $table->longText('comments')->nullable();
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('bank_account_type_id')->references('id')->on('bank_account_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_accounts');
    }
}
