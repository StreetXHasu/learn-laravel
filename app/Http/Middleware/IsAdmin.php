<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && !$request->user()->is_admin) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized.',
                'errors' => ['error' => 'dont have permission']
            ], 401);
        }
        return $next($request);
    }
}
