<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name','500');
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('bio')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->date('dob')->nullable();
            $table->enum('user_type',['admin','moderator','supplier','customer']);
            $table->string('address')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('governorate_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('whatsApp')->nullable();
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
        Schema::dropIfExists('users');
    }

    public function scopeType($query,$arg)
    {
        return $query->where('user_type',$arg);
    }
}
