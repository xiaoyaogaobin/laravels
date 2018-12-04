<?php

namespace App\Providers;

use App\Models\Comments;
use App\Models\Config;
use App\Observers\CommentObserver;
use App\Observers\ConfigObserver;
use App\Observers\UserObserver;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);
//        修改时间为中文时间
        Carbon::setLocale('zh');
        //**************注册观察者************
        User::observe(UserObserver::class);
        Comments::observe(CommentObserver::class);
        Config::observe(ConfigObserver::class);
        //**************注册观察者************

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
