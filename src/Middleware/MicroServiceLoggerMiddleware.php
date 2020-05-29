<?php

namespace Mont4\MicroServiceLogger\Middleware;

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
        $config = config('micro_service_logger');

        if ($config['force_generate_uuid'] || !$request->headers->has('logger_uuid'))
            $request->headers->set('logger_uuid', Str::uuid());

        if ($config['log_all_request'])
            \Log::info('');

        return $next($request);
    }
}
