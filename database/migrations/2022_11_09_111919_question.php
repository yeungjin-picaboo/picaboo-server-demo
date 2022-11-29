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
            $table->string('answer')->nullable();
            $table->string('writer');
            $table->string('question','100');
            $table->string('description','1000');
            $table->timestamps();
//            $table->foreign('email')->references('email')->on('users');
            $table->foreign('writer')->references('user_nickname')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
