<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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
        Validator::extend('exists_in_database', function ($attribute, $value, $parameters, $validator) {
            $field = $parameters[0]; // Field to check, could be 'email' or 'username'
            $user = User::where($field, $value)->first();
            return $user !== null;
        });
    }
}
