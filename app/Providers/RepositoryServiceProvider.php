<?php

namespace ApiWebSac\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'ApiWebSac\Repositories\UserRepository',
            'ApiWebSac\Repositories\UserRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebSac\Repositories\CompanyRepository',
            'ApiWebSac\Repositories\CompanyRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebSac\Repositories\AddressRepository',
            'ApiWebSac\Repositories\AddressRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebSac\Repositories\PatientRepository',
            'ApiWebSac\Repositories\PatientRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebSac\Repositories\ProductRepository',
            'ApiWebSac\Repositories\ProductRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebSac\Repositories\PatientContactRepository',
            'ApiWebSac\Repositories\PatientContactRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebSac\Repositories\SolicitationRepository',
            'ApiWebSac\Repositories\SolicitationRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebSac\Repositories\SolicitationItemRepository',
            'ApiWebSac\Repositories\SolicitationItemRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebSac\Repositories\SchedulingSolicitationRepository',
            'ApiWebSac\Repositories\SchedulingSolicitationRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebSac\Repositories\SchedulingAttemptRepository',
            'ApiWebSac\Repositories\SchedulingAttemptRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebSac\Repositories\AuditRepository',
            'ApiWebSac\Repositories\AuditRepositoryEloquent'
        );
    }
}
