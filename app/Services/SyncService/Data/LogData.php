<?php

namespace App\Services\SyncService\Data;

class LogData
{
    protected $data;

    public function __construct(\Kassner\LogParser\SimpleLogEntry $entry)
    {
        $this->data = $entry;
    }

    public function getHost(): string
    {
        return $this->data->host ?? '';
    }

    public function getRequest(): string
    {
        return $this->data->request ?? '';
    }

    public function getTime(): ?string
    {
        return $this->data->time;
    }

    public function getDate(): ?string
    {
        return date('Y-m-d h:i:s', strtotime($this->data->time));
    }

    public function getStatus(): int
    {
        return (int) $this->data->status;
    }

    public function getUA(): string
    {
        return $this->data->HeaderUserAgent ?? '';
    }

    public function getData(): \Kassner\LogParser\SimpleLogEntry
    {
        return $this->data;
    }
}
