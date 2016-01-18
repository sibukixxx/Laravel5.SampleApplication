<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 学校区分マスターデータ
        Schema::create('school_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 5)->unique()->index();
            $table->string('name', 255);
        });

        $school_types = array(
            array( 'code'  => 101, 'name' => '大学院' ),
            array( 'code'  => 201, 'name' => '大学' ),
            array( 'code'  => 301, 'name' => '短期大学' ),
            array( 'code'  => 401, 'name' => '専修・各種学校' ),
            array( 'code'  => 501, 'name' => '高等専門学校' ),
            array( 'code'  => 601, 'name' => '高等学校' ),
            array( 'code'  => 701, 'name' => '中学校' ),
            array( 'code'  => 801, 'name' => '小学校' ),
            array( 'code'  => 901, 'name' => 'その他' ),
        );
        DB::table('school_types')->insert($school_types);

        // 学業区分マスターデータ
        Schema::create('study_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 5)->unique()->index();
            $table->string('name', 255);
        });

        $study_types = array(
            array( 'code'  => 101, 'name' => '文系' ),
            array( 'code'  => 201, 'name' => '理系' ),
            array( 'code'  => 901, 'name' => 'その他' ),
        );
        DB::table('study_types')->insert($study_types);

//        // 国マスターデータ
//        Schema::create('countries', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('contory_code', 5)->unique()->index();
//            $table->string('abbreviation_name', 5)->unique()->index();
//            $table->string('full_name', 255);
//        });
//
//        $countries = array(
//            array( 'contory_code'  => 101, 'abbreviation_name' => '文系' ,  'full_name' => 'アメリカ'),
//            array( 'contory_code'  => 201, 'abbreviation_name' => '理系' , 'full_name' => 'アメリカ'),
//            array( 'contory_code'  => 901, 'abbreviation_name' => 'その他' , 'full_name' => 'アメリカ' ),
//        );
//        DB::table('study_types')->insert($countries);

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
