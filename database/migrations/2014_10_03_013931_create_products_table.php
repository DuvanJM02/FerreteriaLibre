<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name');
            $table->string('category');
            $table->text('description');
            $table->double('size')->nullable();
            $table->integer('price');
            $table->integer('stock')->nullable();
            $table->boolean('state')->nullable();
            //clave foranea
            $table->foreignId('storeId')->nullable();
            $table->foreign('storeId')->references('storeId')->on('stores');
            $table->bigInteger('vendorId')->nullable();
            $table->foreign('vendorId')->references('userId')->on('users');
            
            $table->string('photo_path', 2048)->nullable();
            $table->string('portada1', 2048)->nullable();
            $table->string('portada2', 2048)->nullable();
            $table->string('portada3', 2048)->nullable();
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
}
