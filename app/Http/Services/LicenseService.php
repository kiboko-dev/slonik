<?php

namespace App\Http\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class LicenseService
{
    public static function checkAvailableNewThread($license, $threadsCount): bool
    {
        dd(self::decodeJWT($license));
        $connections = (int)self::decodeJWT($license)->connections;
        return $threadsCount < $connections;
    }

    private static function decodeJWT(string $jwt): \stdClass
    {
        return JWT::decode($jwt, new Key(config('slonik.jwt_key'), 'HS256'));
    }

}
