<?php

namespace Modules\SubscriptionType\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class SubscriptionTypeServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(module_path('SubscriptionType', 'Database/Migrations'));
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
            module_path('SubscriptionType', 'Config/config.php') => config_path('subscriptiontype.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('SubscriptionType', 'Config/config.php'), 'subscriptiontype'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/subscriptiontype');

        $sourcePath = module_path('SubscriptionType', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/subscriptiontype';
        }, \Config::get('view.paths')), [$sourcePath]), 'subscriptiontype');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/subscriptiontype');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'subscriptiontype');
        } else {
            $this->loadTranslationsFrom(module_path('SubscriptionType', 'Resources/lang'), 'subscriptiontype');
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
            app(Factory::class)->load(module_path('SubscriptionType', 'Database/factories'));
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
