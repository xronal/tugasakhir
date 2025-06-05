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
        Schema::create('package_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code')->index();
            $table->string('package_code')->index();
            $table->bigInteger('price')->default(0);
            $table->timestamps();

            $table->foreign('transaction_code')
                ->references('transaction_code')->on('transactions')
                ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('package_code')
                ->references('campsite_code')->on('campsites')
                ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_transactions');
    }
};
