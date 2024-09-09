<?php

namespace app\Services;

use SettingsRepository;

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