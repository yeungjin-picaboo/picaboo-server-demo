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
            $table->string('user_id','100')->primary();
            $table->string('password','100');
            $table->string('name','10');
            $table->string('user_nickname','100')->unique();
            $table->string('user_email','100')->unique();
            $table->integer('user_phnum')->unique();
            $table->boolean('permission')->default(1);
            $table->timestamps(); // timestamp 메서드와 timestamps 메서드는 다름
                                  // timestamps 메서드는 created_at updated_at 컬럼 생성
                                  
            
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
