<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('transaction_code')->unique()->primary();
            $table->date('transaction_date');
            $table->date('payment_date');
            $table->string('payment_status');
            $table->string('customer_code');
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->bigInteger('total_campsite_price');
            $table->bigInteger('total_addons_price');
            $table->bigInteger('total_people_entry_price');
            $table->timestamps();

            $table->foreign('customer_code')->references('customer_code')->on('customers')->onDelete('restrict');
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
};
