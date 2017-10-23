<?php

use App\User;
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
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('full_name');
            $table->string('phone')->unique();
            $table->string('faculty')->nullable();
            $table->string('major')->nullable();
            $table->string('hometown')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('birthday')->nullable();
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('path')->nullable();
            $table->boolean('is_admin')->default(false);
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
