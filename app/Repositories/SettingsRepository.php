<?php

use App\Exceptions\NoDefaultSettingsException;
use App\Models\Setting;
use App\Models\SettingValue;

class SettingsRepository
{
    /**
     * @throws NoDefaultSettingsException
     */
    public function getDefaultSettings(): ?array
    {
        $settings =  Setting::all()->pluck('default_value', 'key')->toArray();

        if (count($settings) === 0) {
            throw new NoDefaultSettingsException();
        }

        return $settings;
    }

    public function getByConnection(string $connection): ?array
    {
        return SettingValue::whereConnectionUuid($connection)->pluck('value', 'key')->toArray();
    }
}