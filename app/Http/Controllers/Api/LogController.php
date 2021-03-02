<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogRequest;
use App\Http\Resources\LogResource;
use App\Repositories\LogRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LogController extends Controller
{
    protected $logRepository;

    public function __construct(LogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function index(LogRequest $request): AnonymousResourceCollection
    {
        $logs = $this->logRepository->getLogs($request);

        return LogResource::collection($logs);
    }
}
