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
        Schema::create('questions', function (Blueprint $table) {
            $table->id('question_num');
            $table->string('email');
            $table->string('user_nickname');
            $table->integer('views');
            $table->string('question_title','100');
            $table->string('question_content','1000');
            $table->timestamps();

            $table->foreign('email')->references('email')->on('users');
            $table->foreign('user_nickname')->references('user_nickname')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
