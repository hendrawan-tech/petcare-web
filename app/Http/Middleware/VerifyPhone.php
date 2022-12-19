<?php

namespace App\Http\Middleware;

use App\Helpers\ResponseFormatter;
use Closure;

class VerifyPhone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->hasVerifiedPhone()) {
            return ResponseFormatter::error([], 'No telepon anda belum diferifikasi', 405);
        }
        return $next($request);
    }
}
