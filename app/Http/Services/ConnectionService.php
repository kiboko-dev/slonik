<?php

namespace App\Http\Services;

use App\Exceptions\ConnectionLimitException;
use App\Exceptions\IncorrectConnectionException;
use App\Http\Repositories\ConnectionRepository;

class ConnectionService
{
    public function __construct(
        protected ConnectionRepository $connectionRepository,
    )
    {
    }

    /**
     * @throws ConnectionLimitException
     * @throws IncorrectConnectionException
     */
    public function connect(?string $connectionUuid = null): array
    {
        $this->checkConnectionsLimit();

        if (null !== $connectionUuid) {
            $this->connectionRepository->check($connectionUuid);
            $this->connectionRepository->update($connectionUuid);
        } else {
            $connectionUuid = $this->connectionRepository->create()->id;
        }

        return [
            'status' => true,
            'connection' => $connectionUuid,
        ];
    }

    /**
     * @throws ConnectionLimitException
     */
    private function checkConnectionsLimit(): void
    {
        if (
            $this->connectionRepository->getCount() >= config('slonik.maxThreads')
        ) {
            throw new ConnectionLimitException();
        }
    }
}
