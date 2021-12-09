<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppings', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');

            //claves foraneas
            $table->foreignId('productId');
            $table->foreign('productId')->references('id')->on('products');

            $table->bigInteger('vendorId');
            $table->foreign('vendorId')->references('userId')->on('users');

            $table->foreignId('storeId')->nullable();
            $table->foreign('storeId')->references('storeId')->on('stores');

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
        Schema::dropIfExists('shoppings');
    }
}
