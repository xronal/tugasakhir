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
        Schema::create('campsite_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code');
            $table->string('campsite_code');
            $table->string('ground_code');
            $table->string('price');
            $table->timestamps();

            $table->foreign('transaction_code')->references('transaction_code')->on('transactions')->onDelete('restrict');
            $table->foreign('campsite_code')->references('campsite_code')->on('campsites')->onDelete('restrict');
            $table->foreign('ground_code')->references('ground_code')->on('grounds')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campsite_transactions');
    }
};
