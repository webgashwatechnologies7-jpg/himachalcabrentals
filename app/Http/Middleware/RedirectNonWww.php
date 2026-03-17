<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectNonWww
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (strpos($request->header('host'), 'www.') === 0) {
            $newUrl = $request->fullUrl();
            $newUrl = str_replace('www.', '', $newUrl);

            return redirect($newUrl, 301);
        }
        return $next($request);
    }
}
