<?php

namespace App\Http\Services;

use App\Enums\FieldType;
use App\Http\Repositories\SettingsRepository;
use App\Http\Resources\SettingsResource;
use App\Models\Setting;
use Database\Seeders\SettingsSeeder;

class SettingsService
{
    public function __construct(protected SettingsRepository $settingsRepository)
    {
    }

    public function getByConnectionUuid(string $connectionUuid): SettingsResource
    {
        return SettingsResource::make($this->settingsRepository->getByConnection($connectionUuid));
    }

    public static function getSettingFieldByKey(string $key)
    {
        $setting = Setting::whereKey($key)->firstOrFail();

        return FieldType::getField($setting->field_type, $setting->name, '', $setting->values);
    }
}
