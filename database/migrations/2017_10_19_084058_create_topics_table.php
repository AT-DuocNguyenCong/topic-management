<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('fields_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->double('expense');
            $table->text('over_view');
            $table->string('urgency');
            $table->text('goal');
            $table->integer('own_user_id')->unsigned();
            $table->integer('max_member')->unsigned()->nullable();
            $table->text('method');
            $table->string('document_path')->nullable();
            $table->tinyInteger('status');
            $table->datetime('date_begin');
            $table->datetime('date_end');
            $table->foreign('fields_id')->references('id')->on('fields');
            $table->foreign('own_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('topics');
    }
}
