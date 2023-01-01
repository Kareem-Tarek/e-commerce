<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email'); /* here it's unlike the subscription table (no unique key for the column here). Because 
                                        users (customers & suppliers ONLY) could submit more than one contact form by using 
                                        only their registered emails.While the "guest" can't not submit contact for to avoid 
                                        the automatic bots inserts & spams */
            $table->string('subject');
            $table->text('message');
            // $table->integer('is_read')->default(0);
            $table->integer('user_id');
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
        Schema::dropIfExists('contacts');
    }
}
