<?php

namespace Mont4\MicroServiceLogger;

use Closure;
use Illuminate\Support\Str;

class MicroServiceLoggerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config('micro_service_logger.force_generate_uuid') || !$request->headers->has('logger_uuid'))
            $request->headers->set('logger_uuid', Str::uuid());

        return $next($request);
    }
}
