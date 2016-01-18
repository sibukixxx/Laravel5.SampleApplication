<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Company; // 追加を忘れない

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // unguard()メソッドは、EloquentのマスアサインメントをOFFにします。
        Model::unguard();
        //
        Company::create([
            'id' => 1,
            'company_id' => 1,
            'name' => '株式会社VApps',
            'name_kana' => 'ぶいあっぷす',
        ]);
        Company::create([
            'id' => 2,
            'company_id' => 2,
            'name' => '株式会社PApps',
            'name_kana' => 'ぴーあっぷす',
        ]);
        Company::create([
            'id' => 3,
            'company_id' => 3,
            'name' => '株式会社AApps',
            'name_kana' => 'あーあっぷす',
        ]);
    }
}