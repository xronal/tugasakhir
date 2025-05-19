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
        Schema::create('packages', function (Blueprint $table) {
            $table->string('package_code')->unique()->primary();
            $table->string('package_name')->unique();
            $table->string('campsite_code');
            $table->bigInteger('weekday_price')->default(0);
            $table->bigInteger('weekly_price')->default(0);
            $table->timestamps();

            $table->foreign('campsite_code')->references('campsite_code')->on('campsites')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
