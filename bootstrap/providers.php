<?php

use Illuminate\Events\EventServiceProvider;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\SuperAdminPanelProvider::class,
    App\Providers\Filament\TenantPanelProvider::class,
    EventServiceProvider::class,
    RouteServiceProvider::class,
    App\Providers\TenancyServiceProvider::class,
];
