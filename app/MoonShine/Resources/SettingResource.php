<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Setting;

use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Setting>
 */
class SettingResource extends ModelResource
{
    protected string $model = Setting::class;

    protected string $title = 'Настройки по-умолчанию';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название', 'name')->sortable(),
                Text::make('Ключ', 'key')->sortable(),
                Text::make('Значение', 'default_value')->sortable()
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'name' => 'required|string',
            'key' => 'required|string',
            'default_value' => 'required',
        ];
    }
}
