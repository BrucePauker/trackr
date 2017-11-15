<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id')->unsigned();
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('street', 255);
            $table->string('zipcode', 5);
            $table->string('city', 45);
            $table->string('country', 45);
            $table->string('avatar')->default('NULL');
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
