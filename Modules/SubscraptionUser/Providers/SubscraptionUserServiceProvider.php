<?php

namespace Modules\SubscraptionUser\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class SubscraptionUserServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(module_path('SubscraptionUser', 'Database/Migrations'));
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
            module_path('SubscraptionUser', 'Config/config.php') => config_path('subscraptionuser.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('SubscraptionUser', 'Config/config.php'), 'subscraptionuser'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/subscraptionuser');

        $sourcePath = module_path('SubscraptionUser', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/subscraptionuser';
        }, \Config::get('view.paths')), [$sourcePath]), 'subscraptionuser');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/subscraptionuser');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'subscraptionuser');
        } else {
            $this->loadTranslationsFrom(module_path('SubscraptionUser', 'Resources/lang'), 'subscraptionuser');
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
            app(Factory::class)->load(module_path('SubscraptionUser', 'Database/factories'));
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
