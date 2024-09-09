<?php

use App\Exceptions\IncorrectConnectionException;
use App\Models\Connection;

class ConnectionRepository
{
    public function getCountByLicense(string $license): int
    {
        return Connection::whereLicense($license)->count();
    }

    public function create(string $license, string $ip)
    {
        return Connection::create([
            'license' => $license,
            'ip' => $ip,
        ]);
    }

    public function update(string $uuid)
    {
        return Connection::find($uuid)->update([
            'updated_at' => now(),
        ]);
    }

    /**
     * @throws IncorrectConnectionException
     */
    public function check(string $uuid, string $ip): void
    {
        if (!Connection::whereId($uuid)->whereIp($ip)->exists()) {
            throw new IncorrectConnectionException();
        }
    }
}