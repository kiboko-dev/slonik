<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\LicenseResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Menu\MenuItem;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    public function register(): void
    {
        moonshine()->home(LicenseResource::class);
    }

    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuItem::make('Лицензии', new LicenseResource()),

            /**
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),
             **/
        ];
    }

    protected function theme(): array
    {
        return [];
    }
}
