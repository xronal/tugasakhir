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
        Schema::create('addons_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code')->index();
            $table->string('item_code')->index();
            $table->integer('qty')->default(0);
            $table->bigInteger('price')->default(0);
            $table->bigInteger('amount')->default(0);
            $table->timestamps();

            $table->foreign('transaction_code')
                ->references('transaction_code')->on('transactions')
                ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('item_code')
                ->references('item_code')->on('items')
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
        Schema::dropIfExists('addons_transactions');
    }
};
