<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('wxid')->nullable();
            $table->string('phone')->nullable();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('visible')->default(true);
            $table->double('lat')->default(0);
            $table->double('long')->default(0);
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
        Schema::dropIfExists('distributors');
    }
}
