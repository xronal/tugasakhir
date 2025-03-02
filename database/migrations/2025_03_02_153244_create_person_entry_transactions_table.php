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
        Schema::create('person_entry_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code');
            $table->string('person_entry_code');
            $table->integer('qty')->default(0);
            $table->bigInteger('price');
            $table->bigInteger('amount');
            $table->timestamps();

            $table->foreign('transaction_code')->references('transaction_code')->on('transactions')->onDelete('restrict');
            $table->foreign('person_entry_code')->references('person_entry_code')->on('person_entries')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_entry_transactions');
    }
};
