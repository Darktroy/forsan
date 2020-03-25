<?php

namespace Modules\BankAccounts\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class BankAccountsServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('BankAccounts', 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('BankAccounts', 'Config/config.php') => config_path('bankaccounts.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('BankAccounts', 'Config/config.php'), 'bankaccounts'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/bankaccounts');

        $sourcePath = module_path('BankAccounts', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/bankaccounts';
        }, \Config::get('view.paths')), [$sourcePath]), 'bankaccounts');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/bankaccounts');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'bankaccounts');
        } else {
            $this->loadTranslationsFrom(module_path('BankAccounts', 'Resources/lang'), 'bankaccounts');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('BankAccounts', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
