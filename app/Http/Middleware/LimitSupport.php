<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LimitSupport
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the current date and the user's IP address
        $today = Carbon::now()->format('Ymd');
        $ipAddress = $request->ip();

        // Check if the user has exceeded the daily limit
        $cacheKey = "support_cases_{$ipAddress}_{$today}";
        $supportCaseCount = Cache::get($cacheKey, 0);

        if ($supportCaseCount >= 5) {
            return to_route('support.table')->with('error', 'Вы превысили дневной лимит обращений в службу поддержки.');
        }

        return $next($request);
    }
}
