<?php

namespace App\Services\SyncService\Exceptions;

class InvalidLogFileException
{
    public function getName(): string
    {
        return 'InvalidLogFileException';
    }
}
