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
        Schema::create('sellings', function (Blueprint $table) {
            $table->id('selling_num');;
            $table->string('title','100');
            $table->string('user_id','20'); 
            $table->string('user_email');
            $table->string('user_nickname');
            $table->string('content','1000');
            $table->integer('views');
            $table->timestamps();

            
            $table->foreign('user_id')->references('user_id')->on('users'); 
            $table->foreign('user_email')->references('user_email')->on('users');;
            $table->foreign('user_nickname')->references('user_nickname')->on('users');;
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
