<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CustomerRepositoryImpl;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Impl\CustomerRepository;
use App\Repositories\Repository;
use App\Services\CustomerServiceImpl;
use App\Services\Impl\CustomerService;

use App\Repositories\ProductRepositoryImpl;
use App\Repositories\Impl\ProductRepository;
use App\Services\Impl\ProductService;
use App\Services\ProductServicelmpl;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Repository::class, EloquentRepository::class);
        $this->app->singleton(CustomerServiceImpl::class, CustomerService::class);
        $this->app->singleton(CustomerRepositoryImpl::class, CustomerRepository::class);


        $this->app->singleton(ProductServicelmpl::class, ProductService::class);
        $this->app->singleton(ProductRepositoryImpl::class, ProductRepository::class);


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
