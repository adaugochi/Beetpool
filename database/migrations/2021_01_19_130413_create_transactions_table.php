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
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->string('transaction_type_id');
            $table->foreign('transaction_type_id')
                ->references('id')
                ->on('transaction_types');
            $table->string('investment_plan_id')->nullable();
            $table->foreign('investment_plan_id')
                ->references('id')
                ->on('investment_plans');
            $table->string('transaction_id')->nullable();
            $table->string('wallet_address')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency')->default('usd');
            $table->string('status')->default('pending');
            $table->string('maturity_status')->nullable();
            $table->timestamp('maturity_date')->nullable();
            $table->string('expected_return')->nullable();
            $table->string('withdrawal_date')->nullable();
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
