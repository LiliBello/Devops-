<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\SiteService;
use Illuminate\Http\JsonResponse;

class SiteController extends Controller
{
    public function __construct(protected SiteService $service) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => $this->service->index(),
        ]);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        return response()->json([
            'message' => 'User created successfully!',
            'user' => new UserResource($this->service->registerUser($request->validated())),
        ], 201);
    }
}
