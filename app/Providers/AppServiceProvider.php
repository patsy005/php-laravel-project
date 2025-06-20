<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Employee;
// use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;


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
        View::composer('*', function ($view) {
            $authEmployee = null;

            if (Session::has('employee_id')) {
                $authEmployee = Employee::find(Session::get('employee_id'));
            }

            $view->with('authEmployee', $authEmployee);
        });
    }
}
