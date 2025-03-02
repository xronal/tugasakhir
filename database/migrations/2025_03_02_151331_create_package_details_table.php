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
        Schema::create('package_details', function (Blueprint $table) {
            $table->id();
            $table->string('package_code');
            $table->string('item_code');
            $table->bigInteger('price');
            $table->integer('qty')->default(0);
            $table->timestamps();

            $table->foreign('package_code')->references('package_code')->on('packages')->onDelete('restrict');
            $table->foreign('item_code')->references('item_code')->on('items')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_details');
    }
};
