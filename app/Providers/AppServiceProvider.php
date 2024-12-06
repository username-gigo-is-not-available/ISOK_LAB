<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ITransactionRepository;
use App\Repositories\TransactionRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ITransactionRepository::class, TransactionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
