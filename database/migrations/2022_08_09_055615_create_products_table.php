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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productCode')->unique();
            $table->string('productName')->require();
            $table->string('productPrice')->nullable();
            $table->string('productQuantity')->nullable();
            $table->string('productBrand')->nullable();
            $table->string('productImage')->nullable();
            $table->string('productDetail')->nullable();
            $table->string('specifications')->nullable();
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
        Schema::dropIfExists('products');
    }
};
