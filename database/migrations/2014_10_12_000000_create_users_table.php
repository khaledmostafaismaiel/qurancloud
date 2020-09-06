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
            $table->string('first_name');
            $table->string('second_name');
            $table->string('user_name')->unique();
            $table->string('hashed_password');
            $table->string('profile_picture')->default('default_profile_picture.png');
            $table->string('cover_picture')->nullable()->default('default_cover_picture.jpg');
            $table->string('from')->nullable();
            $table->string('lives')->nullable();
            $table->string('study')->nullable();
            $table->string('work')->nullable();
            $table->string('gender')->nullable();
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
