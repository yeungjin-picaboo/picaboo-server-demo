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
        Schema::create('comments', function (Blueprint $table){
            $table->id('comment_num'); //TODO 덧글 번호
            $table->foreignId('selling_num'); //TODO 자게 글 번호
            $table->string('user_nickname'); //! 닉네임만 가져올지 id, email 전부 가져올지?
            $table->string('comment','100'); //TODO 코맨트 
            $table->timestamps(); //TODO 수정 날짜 및 업데이트 날자

            $table->foreign('selling_num')->references('selling_num')->on('sellings'); 
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
