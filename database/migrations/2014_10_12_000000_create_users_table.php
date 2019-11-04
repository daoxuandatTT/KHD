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
            $table->Increments('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('image')->default('default.png')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('description',500)->nullable();
            $table->string('job')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
