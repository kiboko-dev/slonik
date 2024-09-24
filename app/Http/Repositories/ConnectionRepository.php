<?php

namespace App\Http\Repositories;

use App\Exceptions\IncorrectConnectionException;
use App\Models\Connection;

class ConnectionRepository
{
    public function getCount(): int
    {
        return Connection::all()->count();
    }

    public function create()
    {
        return Connection::create([
            'settings' => config('slonik.settings')
        ]);
    }

    public function update(string $uuid)
    {
        return Connection::find($uuid)->update([
            'updated_at' => now(),
        ]);
    }

    public function updateGetLastSettings(string $uuid)
    {
        return Connection::find($uuid)->update([
            'last_connection' => now(),
        ]);
    }

    /**
     * @throws IncorrectConnectionException
     */
    public function check(string $uuid): void
    {
        if (!Connection::whereId($uuid)->exists()) {
            throw new IncorrectConnectionException();
        }
    }
}
