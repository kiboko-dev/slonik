<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Connection;

use MoonShine\Buttons\DeleteButton;
use MoonShine\Fields\Date;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

class ConnectionResource extends ModelResource
{
    protected string $model = Connection::class;

    protected string $title = 'Соединения';


    public function getActiveActions(): array
    {
        return ['view', 'delete', 'massDelete'];
    }

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('ip')->nullable(),

                BelongsTo::make(
                    label: 'Лицензия',
                    relationName: 'relatedLicense',
                    formatted: fn($item) => "$item->client_name<br> ($item->id)",
                    resource: new LicenseResource()
                ),
                Date::make('Последнее подключение','updated_at')->sortable(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
