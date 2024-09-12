<?php

namespace App\Http\Repositories;

use App\Models\License;

class LicenseRepository
{
    public function getAvailableCountForLicense(string $license): ?int
    {
        return License::find($license)->connections;
    }
}
