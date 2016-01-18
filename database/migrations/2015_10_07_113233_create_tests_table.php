<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 生SQLテスト
	Schema::table('tests', function(Blueprint $table){
        $sql = '
            CREATE TABLE tests (
              id serial PRIMARY KEY,
              created_at timestamp DEFAULT current_timestamp,
              memos int[]
            )';
        DB::connection()->getPdo()->exec($sql);
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
