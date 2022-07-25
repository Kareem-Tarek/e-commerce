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
            $table->string('slug');
            $table->string('description');
            $table->string('image_name');
            $table->string('price');
            $table->string('sale_price');
            $table->enum('product_category',['men','women','kids']);
            // $table->unsignedBigInteger('cart_id');
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('cart_id')->references('id')->on('carts');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
