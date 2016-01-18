<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CompanyServiceInterface;
use App\Services\CompanyService;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ルールの名称： no_ctrl_chars
        Validator::extend('no_ctrl_chars', 'App\Libraries\Validation\ParameterValidator@validateNoControlCharacters');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 会社サービス
        $this->app->singleton(CompanyServiceInterface::class, CompanyService::class);
    }
}
