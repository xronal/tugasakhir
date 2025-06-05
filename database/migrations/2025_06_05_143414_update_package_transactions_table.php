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
        Schema::table('package_transactions', function (Blueprint $table) {
            // Drop foreign key lama
            $table->dropForeign(['package_code']);

            // Tambahkan foreign key baru ke tabel packages
            $table->foreign('package_code')
                ->references('package_code')->on('packages')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_transactions', function (Blueprint $table) {
            // Drop foreign key baru
            $table->dropForeign(['package_code']);

            // Kembalikan foreign key ke tabel campsites
            $table->foreign('package_code')
                ->references('campsite_code')->on('campsites')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }
};
