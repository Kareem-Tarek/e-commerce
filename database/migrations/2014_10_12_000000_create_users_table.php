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
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
            $table->string('username')->unique();
            $table->string('name','500')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            //(admin -> CRUD), (moderator -> CR), (supplier CRUD for products only!) & (customer CRUD for cart only!)
            $table->enum('user_type',['admin','moderator','supplier','customer'])->default('customer');
            $table->string('phone')->unique()->nullable();
            $table->longText('bio')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('gender', ['male','female'])->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->integer('country_id')->nullable(); // still on wait (no table yet!)
            $table->integer('governorate_id')->nullable(); // still on wait (no table yet!)
            $table->integer('city_id')->nullable(); // still on wait (no table yet!)
            $table->string('whatsapp')->unique()->nullable();
            $table->string('facebook')->unique()->nullable();
            $table->string('instagram')->unique()->nullable();
            $table->integer('create_user_id')->nullable(); // for dashboard (admin & moderator) when they create user
            $table->integer('update_user_id')->nullable(); // for dashboard (admin) when they update user
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
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

}
