<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\tblJob;
use App\Models\tblCompany;
use App\Models\User;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $view->with('total_jobs', tblJob::count())
                ->with('total_companies', tblCompany::count())
                ->with('total_users', User::count());
        });

        Paginator::useBootstrapFive();
    }
}
