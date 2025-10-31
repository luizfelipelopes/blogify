<?php

namespace App\Providers;

use App\Interfaces\ImportPostInterface;
use App\Services\FakeStoreService;
use App\Services\ImportPostService;
use App\Services\JsonPlaceHolderService;
use Illuminate\Support\ServiceProvider;

class ImportServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->when(ImportPostService::class)
            ->needs(ImportPostInterface::class)
            ->give(function ($app) {
                // 1. Get the current request instance
                $request = $app->make(\Illuminate\Http\Request::class);
                
                // 2. Determine the type from the request (e.g., from a query parameter 'type')
                $type = $request->input('type', 'blog'); // Default to 'blog'
                
                // 3. Use the match logic to decide which concrete class to return
                $concreteClass = match ($type) {
                    'blog' => JsonPlaceHolderService::class,
                    'product' => FakeStoreService::class,
                    default => JsonPlaceHolderService::class,
                };

                // 4. Resolve the chosen concrete class and inject it
                return $app->make($concreteClass);
            });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
