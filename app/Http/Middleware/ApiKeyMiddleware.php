<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ApiKey;

class ApiKeyMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$request->header('x-api-key')) {
            return response()->json(['error' => 'Clé API manquante'], 401);
        }

        $apiKey = $request->header('x-api-key');

        $apiKeyQuery = ApiKey::where('key', $apiKey)->first();

        if (!$apiKeyQuery) {
            return response()->json(['error' => 'Clé API invalide'], 401);
        }

        $user = $apiKeyQuery->user;

        $request->merge(['user' => $user]);

        return $next($request);
    }
}