<?php

namespace Tests\Unit;

use App\Exceptions\ConnectionLimitException;
use App\Models\License;
use app\Services\LicenseService;
use ConnectionRepository;
use LicenseRepository;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

use function PHPUnit\Framework\assertTrue;

class LicenseServiceTest extends TestCase
{
    /**
     * @throws ConnectionLimitException
     */
    public function testCheckConnectionLimitSuccess(
    )
    {
        $license = Uuid::uuid4();
//        $connection = Uuid::uuid4();
//
//        $license = License::create([
//            'client_name'   => 'test',
//            'connections'   =>  2
//        ]);

//        dd($license);

//        $service->checkConnectionsLimit($license->id);
        assertTrue(true);

    }

    public function testCheckConnectionLimitException()
    {

    }
}
