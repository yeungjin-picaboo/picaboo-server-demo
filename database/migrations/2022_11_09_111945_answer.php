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
            $table->unsignedBigInteger('question_num');
//                ->constrained('questions'); //TODO question <- 테이블명 _question_num <- 컬럼명
            $table->string('user_nickname'); //
            $table->string('answer','1000');
            $table->timestamps();
//            $table->boolean('permisson'); -> 추후 관리자 페이지
            $table->foreign('question_num')->references('question_num')->on('questions');
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
