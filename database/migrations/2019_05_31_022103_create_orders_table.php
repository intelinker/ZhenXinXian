<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('commodity_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('distributor_id')->references('id')->on('customers')->onDelete('cascade')->nullable();
            $table->string('activity_id')->references('id')->on('customers')->onDelete('cascade')->nullable();
            $table->string('price');
            $table->string('delivered_time')->nullable();
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
}
