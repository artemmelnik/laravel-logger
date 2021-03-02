<?php

namespace App\Repositories;

use App\Http\Requests\LogRequest;
use App\Models\Log;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LogRepository
{
    public function getLogs(LogRequest $request): ?LengthAwarePaginator
    {
        $query = Log::query();

        if ($request->host()) {
            $query = $query->where('host', $request->host());
        }

        if ($request->date()) {
            $query = $query->where('written_at', $request->date());
        }

        return $query->orderBy('id', 'desc')->paginate(100);
    }

    public function createLog(array $attributes): ?Log
    {
        return Log::create($attributes);
    }

    public function hasLog(string $host, string $date): bool
    {
        return (bool) Log::query()
            ->where('host', $host)
            ->where('written_at', $date)
            ->count();
    }
}
