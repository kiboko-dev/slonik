<?php

use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

// Получение настроек
Route::post('/settings', [SettingController::class, 'getByConnection']);

// Проверка лицензии и подключение
Route::post('/connect', [ConnectionController::class, 'connect']);
