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
            //$table->id();
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable(); //
            $table->string('image');
            $table->integer('available_quantity'); // //this column is for admins, moderators & suppliers only!
            $table->integer('size_id')->nullable();
            // $table->string('color')->nullable();
            $table->decimal('price');
            $table->integer('clothing_type')->unsigned()->nullable();
            $table->foreign('clothing_type')->references('id')->on('categories');
            $table->enum('is_accessory' , ['yes','no']);
            $table->enum('product_category' , ['men','women','kids']);
            $table->decimal('discount')->default(0)->nullable();
            // $table->string('brand_name');   // for supplier relationship (from users table)
            $table->integer('create_user_id')->nullable();
            $table->integer('update_user_id')->nullable();
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
