<?php

namespace App\Providers;

use App\Repositories\Student\StudentEloquent;
use App\Repositories\Student\StudentRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
 * @author Hafiz Suhaimi <pisyek@gmail.com>
 * @copyright 2018 Pisyek Studios
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(StudentRepository::class, StudentEloquent::class);
    }
}
