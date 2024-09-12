<?php

namespace App\Http\Services;

use App\Http\Repositories\SettingsRepository;

class SettingsService
{
    public function __construct(protected SettingsRepository $settingsRepository)
    {
    }

    public function getByConnectionUuid(string $connectionUuid): array
    {
        $settings = $this->settingsRepository->getByConnection($connectionUuid);

        if (count($settings) === 0) {
            $settings = $this->settingsRepository->getDefaultSettings();
        }

        return $settings;
    }
}
