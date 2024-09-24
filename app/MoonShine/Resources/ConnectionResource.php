<?php

namespace App\MoonShine\Resources;

use App\Enums\FieldType;
use App\Http\Repositories\SettingsRepository;
use App\Http\Services\SettingsService;
use Illuminate\Database\Eloquent\Model;
use App\Models\Connection;

use MoonShine\Fields\Date;
use MoonShine\Fields\Json;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class ConnectionResource extends ModelResource
{
    protected string $model = Connection::class;

    protected string $title = 'Соединения';


    public function getActiveActions(): array
    {
        return ['view','update', 'delete', 'massDelete'];
    }

    public function fields(): array
    {
        foreach (SettingsRepository::getFields() as $field) {
            $settings[] = FieldType::getField(
                type: $field->field_type,
                label: $field->name,
                column: $field->key,
                values: $field->values
            );
        }
        return [
                ID::make()->sortable(),
                Date::make('Настройки получены','last_connection')->sortable()->readonly()->hideOnUpdate(),
                Block::make('Настройки',[
                    Number::make('Количество потоков', 'threads_count')->max(64)->step(1)->hideOnIndex(),
                    Select::make('Разрешение', 'thread_resolution')->options([
                        '480p' => '480p',
                        '720p' => '720p',
                        '1080p' => '1080p',
                        ])->hideOnIndex(),
                    Select::make('Частота кадров', 'thread_framerate')->options([
                        10 => 10,
                        15 => 15,
                        25 => 25,
                        30 => 30
                    ])->hideOnIndex(),
                    Switcher::make('Подсветка активного монитора', 'highlight_active_tread')->hideOnIndex(),
                    Switcher::make('Подсветка зоны указателя мыши', 'highlight_mouse_pointer_area')->hideOnIndex(),
                ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
