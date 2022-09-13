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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');// thong tin nguoi mua
            $table->string('phone_number');// thong tin nguoi mua
            $table->string('email');// thong tin nguoi mua
            $table->string('order_name');// thong tin nguoi mua
            $table->string('shipping_address');// dia chi giao hang
            $table->string('grand_total');//tong don gia
            $table->string('code');//ma giao hang
            $table->string('delivery_status')->nullable();//trang thai giao hang
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
        Schema::dropIfExists('orders');
    }
};
