<?php

namespace Modules\UserToSubscription\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class UserToSubscriptionServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(module_path('UserToSubscription', 'Database/Migrations'));
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
            module_path('UserToSubscription', 'Config/config.php') => config_path('usertosubscription.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('UserToSubscription', 'Config/config.php'), 'usertosubscription'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/usertosubscription');

        $sourcePath = module_path('UserToSubscription', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/usertosubscription';
        }, \Config::get('view.paths')), [$sourcePath]), 'usertosubscription');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/usertosubscription');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'usertosubscription');
        } else {
            $this->loadTranslationsFrom(module_path('UserToSubscription', 'Resources/lang'), 'usertosubscription');
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
            app(Factory::class)->load(module_path('UserToSubscription', 'Database/factories'));
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
