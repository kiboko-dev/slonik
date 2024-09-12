<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\License;
use MoonShine\Fields\Number;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;

class LicenseResource extends ModelResource
{
    protected string $model = License::class;

    protected string $title = 'Лицензии';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Лицензия', 'id')->readonly()->sortable(),
                Text::make('Организация', 'client_name')->sortable(),
                Number::make('МАХ подключений', 'connections')
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'client_name'   =>  'required|string',
            'connections'   =>  'required|integer',
        ];
    }
}
