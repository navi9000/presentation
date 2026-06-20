<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogAllRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $logData = [
            'IP_Address' => $request->ip(),
            'Method'     => $request->method(),
            'URL'        => $request->fullUrl(),
            'Payload'    => $request->all(),
            'Status'     => $response->getStatusCode(),
        ];

        Log::channel('requests')->info('Incoming Request', $logData);

        return $response;
    }
}
