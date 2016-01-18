<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatorsCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // LaravelのEloquentを使って複合主キーを使用したテーブルを操作する方法
        // http://qiita.com/wrbss/items/7245103a5fef88cbdde9#%E3%81%A7%E3%81%8D%E3%82%8B%E3%81%93%E3%81%A8%E3%81%A7%E3%81%8D%E3%81%AA%E3%81%84%E3%81%93%E3%81%A8

        /*
         * 会社IDと担当者IDで複合ユニークキーとする
         * ※担当者が複数会社に存在する可能性があるため
         *
         */

        // 会社テーブル
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->char('country', 2)->default('ja');
            $table->bigInteger('prefecture')->default('0 ');
            $table->string('address', 255)->default('');
            $table->string('postal_code', 32)->default('');
            $table->string('telephone', 32)->default('');
            $table->timestamps();
        });

        // 担当者テーブル
        Schema::create('operators', function (Blueprint $table) {

            $table->integer('operator_id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();

            $table->unique(['company_id', 'operator_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
        Schema::dropIfExists('operators');
    }
}
