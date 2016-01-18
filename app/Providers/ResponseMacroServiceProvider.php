<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\ResponseFactory;


class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {

        // macroメソッドは登録名を第１引数、クロージャーを第２引数に取ります。
        // マクロのクロージャーはResponseFactoryの実装か、responseヘルパーに対し、登録名で呼び出すことで、実行されます。
        // return response()->caps('foo');

        $factory->macro('çsv', function($value) use ($factory){
            // CSV download 処理を追加する


        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
