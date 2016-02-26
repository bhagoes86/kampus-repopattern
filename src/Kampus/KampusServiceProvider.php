<?php

/*
 * Step - 6
 */
namespace Odenktools\Kampus;

use Illuminate\Support\ServiceProvider;

use Odenktools\Kampus\Models\Mahasiswa;
use Odenktools\Kampus\Repositories\Eloquent\EloquentMahasiwaRepository;

class KampusServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Publishing Configuration file to main laravel app
     *
     * package config files
     * php artisan vendor:publish --provider="Odenktools\Kampus\KampusServiceProvider" --tag="config"
     * @return void
     */
    private function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/kampus.php' => config_path('kampus.php')
        ], 'config');
    }

    /**
     * Publishing views files
     * php artisan vendor:publish --provider="Odenktools\Kampus\KampusServiceProvider" --tag="views"
     * @return void
     */
    private function publishViewFolder()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/odenktools'),
        ], 'views');
    }

    /**
     * Publishing migration file to main laravel app
     *
     * <code>
     * php artisan vendor:publish --provider="Odenktools\Kampus\KampusServiceProvider" --tag="migrations"
     * php artisan migrate
     * </code>
     *
     * @return void
     */
    private function publishMigrations()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations' => base_path('database/migrations'),
        ], 'migrations');
    }

    /**
     * Publishing seeds file to main laravel app
     *
     * <code>
     * php artisan vendor:publish --provider="Odenktools\Kampus\KampusServiceProvider" --tag="seeds"
     * php artisan db:seed
     * php artisan db:seed --class=KampusSeeder
     * </code>
     *
     * @return void
     */

    private function publishSeeder()
    {
        $this->publishes([
            __DIR__ . '/../database/seeds/' => base_path('database/seeds')
        ], 'seeds');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();

        $this->publishMigrations();

        $this->publishSeeder();

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'kampus');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'kampus');

        $this->publishViewFolder();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

		/* Masukan repository disini */
        $this->app->singleton('kampus', function ($app) {
            return new Kampus($app, $app['kampus.mahasiswa']);
        });

        $this->app->singleton('kampus.mahasiswa', function ($app) {
            return new EloquentMahasiwaRepository($app, new Mahasiswa());
        });

        $this->app->singleton('Odenktools\Kampus\Contracts\Repositories\MahasiswaRepository', function ($app) {
            return $app['kampus.mahasiswa'];
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['kampus', 'kampus.mahasiswa'];
    }

}
