<?php

namespace App\Http\Repositories;

use App\Exceptions\NoDefaultSettingsException;
use App\Models\Connection;
use App\Models\Setting;
use App\Models\SettingValue;

class SettingsRepository
{
    /**
     * @throws NoDefaultSettingsException
     */
    public function getDefaultSettings(): ?array
    {
        $settings = Setting::all()->pluck('default_value', 'key')->toArray();

        if (count($settings) === 0) {
            throw new NoDefaultSettingsException();
        }

        return $settings;
    }

    public function getByConnection(string $connectionUuid): ?Connection
    {
        return Connection::findOrFail($connectionUuid);

    }

    public static function getFields()
    {
        return Setting::all();
    }
}
