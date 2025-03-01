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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('kode_transaksi');
            $table->date('tanggal_transaksi');
            $table->string('status_bayar');
            $table->date('tanggal_bayar');
            $table->string('id_customer');
            $table->integer('grand_total');
            $table->date('tanggal_checkin');
            $table->date('tanggal_checkout');
            $table->int('grand_total_campsite');
            $table->int('grand_total_addons');
            $table->int('grand_total_people_entry');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
