<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Interfaces\UserInterface', 'App\Repositories\UserRepository');
        $this->app->singleton('App\Interfaces\CategoryInterface', 'App\Repositories\CategoryRepository');
        $this->app->singleton('App\Interfaces\PublisherInterface', 'App\Repositories\PublisherRepository');
        $this->app->singleton('App\Interfaces\MemberInterface', 'App\Repositories\MemberRepository');
        $this->app->singleton('App\Interfaces\BookInterface', 'App\Repositories\BookRepository');
        $this->app->singleton('App\Interfaces\LoanInterface', 'App\Repositories\LoanRepository');
        $this->app->singleton('App\Interfaces\DetailLoanInterface', 'App\Repositories\DetailLoanRepository');
        $this->app->singleton('App\Interfaces\ReturnInterface', 'App\Repositories\ReturnRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    }
}
