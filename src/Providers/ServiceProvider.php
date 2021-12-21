<?php

namespace Jecar\Commerce\Providers;

use Illuminate\Support\ServiceProvider as BaseProvider;
use Jecar\Commerce\Services\CommerceService;

class ServiceProvider extends BaseProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias(CommerceService::class, 'jecar-commerce');

        $this->loadViewsFrom(
            $this->viewGroups(), 'jecar'
        );

        $this->commands([
            PublishMigrations::class,
            PublishViews::class,
        ]);

    }

    public function viewGroups()
    {
        if(file_exists(resource_path('views/vendor/commerce/commerce.blade.php'))) {
            return resource_path('views/vendor/commerce');
        }
        return  $this->resourcePath('views');
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

    public function publishables()
    {

    }

    public function resourcePath(string $res)
    {
        return __DIR__ . '../../../resources/' . $res;
    }
}
