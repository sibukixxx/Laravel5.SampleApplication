<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CompanyRepository;
use App\Repositories\CompanyInterface;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $models = array(
//            'Category',
//            'Product',
//        );
//
//        foreach ($models as $model) {
//            $this->app->bind("App\\Contracts\\Models\\{$model}RepositoryInterface", "App\\Repositories\\{$type}\\{$type}{$model}Repository");
//        }

        // 会社インターフェスと会社リポジトリの連結
        $this->app->bind(CompanyInterface::class, CompanyRepository::class);
    }
}