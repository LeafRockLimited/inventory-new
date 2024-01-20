<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        

		$this->app->bind(
			\App\Interfaces\ProductServiceInterface::class,
			\App\Services\ProductService::class
		);

		$this->app->bind(
			\App\Interfaces\TransaksiServiceInterface::class,
			\App\Services\TransaksiService::class
		);

		$this->app->bind(
			\App\Interfaces\DetailTransaksiInterface::class,
			\App\Services\DetailTransaksi::class
		);

		$this->app->bind(
			\App\Interfaces\DetailTransaksiServiceInterface::class,
			\App\Services\DetailTransaksiService::class
		);

		$this->app->bind(
			\App\Interfaces\SkuServiceInterface::class,
			\App\Services\SkuService::class
		);

		$this->app->bind(
			\App\Interfaces\PemasokServiceInterface::class,
			\App\Services\PemasokService::class
		);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
