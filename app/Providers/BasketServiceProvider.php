<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\BasketInterfaceRepository;
use App\Repositories\BasketSessionRepository;
use App\Repositories\BasketInterfaceRepository1;
use App\Repositories\BasketSessionRepository1;

class BasketServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        $this->app->bind(BasketInterfaceRepository::class, BasketSessionRepository::class);
        $this->app->bind(BasketInterfaceRepository1::class, BasketSessionRepository1::class);
    }

    // ...
}