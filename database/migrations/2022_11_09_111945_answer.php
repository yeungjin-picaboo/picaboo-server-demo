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
        Schema::create('answers', function (Blueprint $table) {
            $table->id('answer_num');
            $table->foreignId('question_question_num'); //TODO question <- 테이블명 _question_num <- 컬럼명
            // ->constrained('questions');
            $table->foreignId('user_user_id');
            $table->foreignId('user_user_email');
            $table->string('answer','1000');
            $table->timestamp('created_at');
            $table->boolean('permisson')->default(1);
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
