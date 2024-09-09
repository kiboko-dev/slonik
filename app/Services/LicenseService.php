<?php

namespace app\Services;

use App\Exceptions\ConnectionLimitException;
use App\Exceptions\IncorrectConnectionException;
use ConnectionRepository;
use LicenseRepository;

class LicenseService
{
    public function __construct(
        protected ConnectionRepository $connectionRepository,
        protected LicenseRepository $licenseRepository
    ) {
    }

    /**
     * @throws ConnectionLimitException
     * @throws IncorrectConnectionException
     */
    public function connect(string $license, ?string $connection = null): array
    {
        $this->checkConnectionsLimit($license);

        if (null !== $connection) {
            $this->connectionRepository->check(
                uuid: $connection,
                ip: request()->ip()
            );

            $this->connectionRepository->update($connection);
        } else {
            $connection = $this->connectionRepository->create(
                license: $license,
                ip: request()->ip
            )->id;
        }

        return [
            'status' => true,
            'license' => $license,
            'connection' => $connection
        ];
    }

    /**
     * @throws ConnectionLimitException
     */
    public function checkConnectionsLimit(string $license): void
    {
        if (
            $this->connectionRepository->getCountByLicense($license)
            >= $this->licenseRepository->getAvailableCountForLicense($license)
        ) {
            throw new ConnectionLimitException();
        }
    }
}