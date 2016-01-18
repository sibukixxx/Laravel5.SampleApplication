<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 0. ユーザー基本情報（基本属性情報、性年代、誕生日など）
        Schema::create('user_attribute_base', function (Blueprint $table) {
            $table->bigInteger('uid');          // ユーザーUniqeID
            $table->string('sex');              // 性別
            $table->string('mobile_phone');     // 携帯電話
            $table->string('landline');         // 固定電話
            $table->char('birthday', 7);           // 生年月日
            $table->string('name');             // 氏名

            // 現住所
            $table->char('postal_code');          // 郵便番号(7桁固定のためCHAR型)
            $table->integer('pref');            // 都道府県（todo: マスターテーブル作成）
            $table->text('address');            // 以降の住所
            $table->string('railroad', 10);     // 〇〇線
            $table->string('station', 10);      // 最寄り駅
            // 出身
            $table->integer('country');         // 国（todo: マスターテーブル作成）
            $table->string('region');           // 地域
        });

        // 1. ユーザー情報（学歴）
        Schema::create('user_attribute_school', function (Blueprint $table) {

            // 日本の最終学歴
            $table->bigInteger('uid');          // ユーザーUniqeID
            $table->string('school');           // 学校名
            $table->integer('school_type');      // 学校区分（todo: マスターデータ要作成）
            $table->string('study_type');         // 文系 or 理系 or その他
            $table->string('department');           // 学科／専攻名
            $table->char('admission_date', 7);                  // 入学年月
            $table->char('graduation_date', 7);                  // 入学年月
            $table->text('text', 7);                  // 学歴補足事項
        });

        // 2. ユーザー情報（語学）
        Schema::create('user_attribute_lang', function (Blueprint $table) {

            // 日本の最終学歴
            $table->bigInteger('uid');          // ユーザーUniqeID
        });

//        // 3. ユーザー情報（希望する就職先）
//        Schema::create('user_attribute_lang', function (Blueprint $table) {
//
//            // 希望する就職先
//            $table->bigInteger('uid');          // ユーザーUniqeID
//        });
//
//        // 4. ユーザー情報（自己アピール）
//        Schema::create('user_attribute_lang', function (Blueprint $table) {
//
//            // 自己アピール
//            $table->bigInteger('uid');          // ユーザーUniqeID
//        });

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
