<?php

namespace App\Services\SyncService;

use App\Repositories\LogRepository;
use App\Services\SyncService\Data\LogData;

class SyncService
{
    protected $logRepository;

    public function __construct(LogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function sync(LogData $logData): bool
    {
        if ($this->logRepository->hasLog($logData->getHost(), $logData->getDate()) === false) {
            $this->logRepository->createLog([
                'host' => $logData->getHost(),
                'time' => $logData->getTime(),
                'request' => $logData->getRequest(),
                'ua' => $logData->getUA(),
                'status' => $logData->getStatus(),
                'written_at' => $logData->getDate()
            ]);

            return true;
        }

        return false;
    }
}
