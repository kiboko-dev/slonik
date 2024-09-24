<?php

namespace App\MoonShine\Resources;

use App\Enums\FieldType;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setting;

use MoonShine\Fields\Select;
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
                Select::make('Тип поля', 'field_type')->options(
                    FieldType::getOptions()
                ),
                Text::make('Значение по-умолчанию', 'default_value')->sortable(),
                Text::make('Маска', 'mask')->sortable(),
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
