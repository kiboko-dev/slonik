<?php

namespace Database\Seeders;

use App\Enums\FieldType;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'name' => 'Количество мониторов',
                'key' => 'threadCount',
                'field_type' => FieldType::SELECT,
                'values' => [1, 2, 3],
                'default_value' => 1,
            ],
            [
                'name' => 'Разрешение',
                'key' => 'threadResolution',
                'field_type' => FieldType::SELECT,
                'values' => ['480p', '720p', '1080p'],
                'default_value' => '1080p',
            ],
            [
                'name' => 'Частота кадров',
                'key' => 'threadFrameRate',
                'field_type' => FieldType::SELECT,
                'values' => [10, 15, 25, 30],
                'default_value' => 25,
            ],
            [
                'name' => 'Подсветка активного монитора',
                'key' => 'highlightActiveTread',
                'field_type' => FieldType::SWITCHER,
                'values' => [false, true],
                'default_value' => true,
            ],
            [
                'name' => 'Подсветка зоны указателя мыши',
                'key' => 'highlightMousePointerArea',
                'field_type' => FieldType::SWITCHER,
                'values' => [false, true],
                'default_value' => true,
            ],
        ];


        foreach ($settings as $setting) {
            Setting::query()->create($setting);
        }

    }
}
