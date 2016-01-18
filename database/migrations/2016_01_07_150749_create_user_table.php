<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ユーザーの基本情報（内部ID＋ログイン情報など）
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');        // システムID+primary id
            $table->bigInteger('uid');          // ユーザーUniqueID
            $table->string('name', 255);
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->unique('uid');
            $table->unique('email');

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
}