<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            $ip = $request->ip();
            $userAgent = $request->header('User-Agent');

            Log::warning("Unauthorized admin access attempt", [
                'ip' => $ip,
                'user_agent' => $userAgent,
                'url' => $request->fullUrl(),
                'time' => now(),
            ]);

            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
