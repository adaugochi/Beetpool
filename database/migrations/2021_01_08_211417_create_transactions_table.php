<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('transaction_type');
            $table->string('transaction_id')->nullable();
            $table->string('wallet_address')->nullable();
            $table->string('amount');
            $table->string('currency')->default('btc');
            $table->string('status')->default('pending');
            $table->string('maturity_status')->nullable();
            $table->timestamp('maturity_date')->nullable();
            $table->string('roi')->nullable();
            $table->string('expected_return')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('transactions');
    }
}
