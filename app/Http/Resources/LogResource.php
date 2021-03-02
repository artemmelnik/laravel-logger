<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'host' => $this->host,
            'time' => $this->time,
            'request' => $this->request,
            'ua' => $this->ua,
            'status' => $this->status,
            'written_at' => $this->written_at,
            'created_at' => $this->created_at
        ];
    }
}
