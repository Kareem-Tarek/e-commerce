<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone')->nullable();
            $table->string('customer_email');
            $table->string('customer_address')->nullable();
            $table->string('product_name');
            $table->integer('available_quantity');
            $table->string('product_image');
            $table->string('is_accessory');
            $table->string('clothing_type')->nullable(); //relationship with categories (clothing types of products) table
            $table->enum('product_category',['men','women','kids']);
            $table->decimal('price');
            $table->decimal('discount')->nullable(); //it could be null (because it might be left null when a product is inserted in products table)
            $table->integer('quantity');
            $table->string('product_id');
            $table->string('customer_id'); //relationship with users (customers ONLY!) table
            $table->integer('update_user_id')->nullable(); // for the dashboard!
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
        Schema::dropIfExists('carts');
    }
}
