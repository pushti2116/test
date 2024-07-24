<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TrackBranchChanges
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (in_array($request->method(), ['POST', 'PUT', 'DELETE'])) {
            $user = auth()->user();
            $action = $request->method();
            $branchId = $request->route('branch');

            Log::info("User ID: $user->id performed $action action on Branch ID: $branchId");
        }

        return $response;
    }
}


