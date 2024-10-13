<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\ConnectionResource;
use App\MoonShine\Resources\SettingResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Menu\MenuItem;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    public function register(): void
    {
        moonshine()->home(ConnectionResource::class);
    }

    protected function resources(): array
    {
        return [
            new ConnectionResource()
        ];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuItem::make('slonik.connections_title', new ConnectionResource())
                ->translatable(),
        ];
    }

    protected function theme(): array
    {
        return [];
    }
}
