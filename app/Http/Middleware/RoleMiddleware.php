<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!$user || !in_array($user->role, $roles)) {
          // If request expects JSON (API)
          if ($request->expectsJson()) {
            return response()->json([
                'message' => 'You cannot access this panel'
            ], 403);
        }

        // Web request → redirect with alert
        return redirect()
            ->back()
            ->with('error', 'You cannot access this panel');
        }

        return $next($request);
    }

}
