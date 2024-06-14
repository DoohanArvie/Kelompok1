<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\tblJob;
use App\Models\tblCompany;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;

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
        // total jobs, companies, users
        view()->composer('*', function ($view) {
            $view->with('total_jobs', tblJob::count())
                ->with('total_companies', tblCompany::count())
                ->with('total_users', User::count());
        });

        // pagination bootstrap 5
        Paginator::useBootstrapFive();

        // set waktu indonesia
        config((['app.locale' => 'id']));
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    }
}
