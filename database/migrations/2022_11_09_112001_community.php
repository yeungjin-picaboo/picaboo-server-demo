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
        Schema::create('communities', function (Blueprint $table) {
            $table->id('communities_num');;
            $table->string('title','100');
            $table->string('writer');
            $table->string('content','1000');
            $table->integer('views')->nullable();
            $table->integer('reply_count')->default(0)->nullable();
            $table->timestamps();

            $table->foreign('writer')->references('user_nickname')->on('users');;
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
