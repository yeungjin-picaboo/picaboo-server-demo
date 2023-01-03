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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email','100')->unique();
            $table->string('password','100');  // 수정 필요 ex) 최대 몇자 특수문자 등(vailidate에서 수정)
            $table->string('name');
            $table->string('user_nickname','100')->unique();
            $table->integer('user_phnum')->unique();
            $table->boolean('permission')->default(1);
            $table->timestamp('email_verified_at')->nullable();
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
};
