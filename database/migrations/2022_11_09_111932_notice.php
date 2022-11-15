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
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('notice_num');
            $table->string('user_id');
            $table->string('user_nickname');
            $table->boolean('permission')->default(1);
            $table->integer('views');
            $table->string('notice_title','100');
            $table->string('notice_content','1000');
            $table->timestamps();
            
            $table->foreign('user_id')->references('user_id')->on('users'); 
            //TODO 버전이 낮은 라라벨 프레임워크의 경우 사용법 
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
