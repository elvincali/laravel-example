<?php

namespace Src\Support\Application\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBTransaction
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param array $connections
     * @return mixed
     */
    public function handle($request, Closure $next, ...$connections)
    {
        foreach ($connections as $connection) {
            DB::connection($connection)->beginTransaction();
        }

        $response = $next($request);

        if (property_exists($response, 'exception')) {
            if ($response->exception instanceof \Throwable) {
                foreach ($connections as $connection) {
                    DB::connection($connection)->rollBack();
                }
            } else {
                foreach ($connections as $connection) {
                    DB::connection($connection)->commit();
                }
            }
        }

        return $response;
    }
}
