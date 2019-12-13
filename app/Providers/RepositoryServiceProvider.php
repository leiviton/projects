<?php

namespace ApiWebPsp\Providers;

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
            'ApiWebPsp\Repositories\UserRepository',
            'ApiWebPsp\Repositories\UserRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebPsp\Repositories\CompanyRepository',
            'ApiWebPsp\Repositories\CompanyRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebPsp\Repositories\AddressRepository',
            'ApiWebPsp\Repositories\AddressRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebPsp\Repositories\PatientRepository',
            'ApiWebPsp\Repositories\PatientRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebPsp\Repositories\ProductRepository',
            'ApiWebPsp\Repositories\ProductRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebPsp\Repositories\PatientContactRepository',
            'ApiWebPsp\Repositories\PatientContactRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebPsp\Repositories\SolicitationRepository',
            'ApiWebPsp\Repositories\SolicitationRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebPsp\Repositories\SolicitationItemRepository',
            'ApiWebPsp\Repositories\SolicitationItemRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebPsp\Repositories\SchedulingSolicitationRepository',
            'ApiWebPsp\Repositories\SchedulingSolicitationRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebPsp\Repositories\SchedulingAttemptRepository',
            'ApiWebPsp\Repositories\SchedulingAttemptRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebPsp\Repositories\AuditRepository',
            'ApiWebPsp\Repositories\AuditRepositoryEloquent'
        );
        $this->app->bind(
            'ApiWebPsp\Repositories\PermissionRepository',
            'ApiWebPsp\Repositories\PermissionRepositoryEloquent'
        );
    }
}
