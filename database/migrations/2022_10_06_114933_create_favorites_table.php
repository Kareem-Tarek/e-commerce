<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            //only to nullable() -> customer_phone | customer_address | clothing_type | update_user_id

            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone')->nullable();
            $table->string('customer_email');
            $table->string('customer_address')->nullable();
            $table->string('product_id')->unique(); // this column is only used for the duplication error when adding the same product again into the favorites
            $table->string('product_name');
            $table->integer('available_quantity');
            $table->string('product_image');
            $table->string('is_accessory');
            $table->string('clothing_type')->nullable(); //relationship with categories (clothing types of products) table
            $table->enum('product_category',['men','women','kids']);
            $table->decimal('price');
            $table->decimal('discount');
            $table->string('customer_id'); //relationship with users (customers ONLY!) table
            $table->integer('update_user_id')->nullable(); // for the dashboard (admin Only!)!
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
        Schema::dropIfExists('favorites');
    }
}
