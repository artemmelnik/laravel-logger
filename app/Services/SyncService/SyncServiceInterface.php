<?php

namespace App\Services\SyncService;

use App\Services\SyncService\Data\LogData;

interface SyncServiceInterface
{
    public function sync(LogData $logData);
}
