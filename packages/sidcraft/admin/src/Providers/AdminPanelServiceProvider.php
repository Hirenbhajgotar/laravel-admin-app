<?php

namespace Sidcraft\Admin\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class AdminPanelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot()
    {
        // Load routes
        if (file_exists('routes/admin.php')) {
            // Use the customized routes
            $this->loadRoutesFrom(base_path('routes/admin.php'));
        } else {
            $this->loadRoutesFrom(__DIR__ . '/../routes/admin.php');
        }

        // Load views
        if (file_exists('views/sidcraft/admin')) {
            // Use the customized views
            $this->loadViewsFrom(resource_path('views/sidcraft/admin'), 'admin');
        } else {
            $this->loadViewsFrom(__DIR__ . '/../Views', 'admin');
        }


        // Publish routes
        $this->publishes([
            __DIR__ . '/../routes/admin.php' => base_path('routes/admin.php'),
        ], 'admin-routes');

        // Publish views
        $this->publishes([
            __DIR__ . '/../Views' => resource_path('views/sidcraft/admin'),
        ], 'admin-views');

        // Publish controller
        $this->publishes([
            __DIR__ . '/../Controllers/UserController.php' => app_path('Http/Controllers/Admin/UserController.php'),
        ], 'admin-controllers');

        // Dynamically run the publishing logic
        // $this->autoPublish();
    }

    /**
     * Automatically publish package files during boot if not already published.
     */
    protected function autoPublish()
    {
        // Check if routes are not published
        if (!file_exists(base_path('routes/admin.php'))) {
            $this->publishGroup('admin-routes');
        }

        // Check if views are not published
        if (!is_dir(resource_path('views/sidcraft/admin'))) {
            $this->publishGroup('admin-views');
        }

        // Check if controllers are not published
        if (!file_exists(app_path('Http/Controllers/Admin/UserController.php'))) {
            $this->publishGroup('admin-controllers');
        }
    }

    /**
     * Publish a specific tag group programmatically.
     *
     * @param string $tag
     */
    protected function publishGroup($tag)
    {
        Artisan::call('vendor:publish', [
            '--tag' => $tag,
            '--force' => true, // Optional: force overwrite if files already exist
        ]);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
