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
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            // $table->enum('size' , ['XS','S','M','L','XL','XXL','XXXL','XXXXL']);
            // $table->string('XS')->default('XS')->nullable();
            // $table->string('S')->default('S')->nullable();
            // $table->string('M')->default('M')->nullable();
            // $table->string('L')->default('L')->nullable();
            // $table->string('XL')->default('XL')->nullable();
            // $table->string('XXL')->default('XXL')->nullable();
            // $table->string('XXXL')->default('XXXL')->nullable();
            // $table->string('XXXXL')->default('XXXXL')->nullable();

            //$table->foreignId('product_id')->constrained()->cascadeOnDelete();            
            $table->enum('size_value' , ['XS','S','M','L','XL','XXL','XXXL','XXXXL']);
            //$table->integer('quantity'); 
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
        Schema::dropIfExists('sizes');
    }
};
