<?php

namespace Jecar\Commerce\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Jecar\Commerce\Controllers\CommerceController;
use Jecar\Commerce\Controllers\MediaController;
use Jecar\Commerce\Controllers\PageController;
use Jecar\Commerce\Controllers\TemplateController;
use Jecar\Commerce\Models\Page;
use Jecar\Core\Services\JecarService;

class CommerceService extends JecarService
{

    public function __construct()
    {
        parent::__construct();
    }

    public function buildRoutes()
    {
        Route::group(['prefix' => $this->config['paths']['commerce']], function() {

            Route::get('/', [ShopController::class, 'index'])->name('commerce');

            Route::group(['prefix' => 'pages', 'as' => 'pages'], function() {
                Route::get('/', [PageController::class, 'index'])->name('');
                Route::post('/', [PageController::class, 'store'])->name('.create');
                Route::get('/{page}', [PageController::class, 'show'])->name('.show');
                Route::put('/{page}', [PageController::class, 'update'])->name('.update');
                Route::delete('/{page}', [PageController::class, 'delete'])->name('.delete');
            });

        });
    }

    public function adminRoutes()
    {
        if(isset($this->config['subdomains']['commerce']) && strlen($this->config['subdomains']['commerce']) > 0) {
            Route::domain($this->config['subdomains']['commerce'] . '.' . config('app.url'))->group(function() {
                $this->buildRoutes();
            });
        } else {
            $this->buildRoutes();
        }
    }

    public function publicRoutes()
    {
        Route::get('/{a}/{b}/{c}', [CommerceController::class, 'content']);

        Route::get('/{a}/{b}', [CommerceController::class, 'content']);

        Route::get('/{a}', [CommerceController::class, 'content']);

        Route::get('/', [CommerceController::class, 'content']);

    }

    public function renderPage($path)
    {
        if(!str_starts_with($path, '/')) {
            $path = '/' . $path;
        }

        $page = Page::wherePath($path)->firstOrFail();

        return $page->render();
    }
}
