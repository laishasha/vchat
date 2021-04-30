<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HeadersMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if ($response instanceof Response) {
            $response->header('X-Frame-Options', 'deny'); //protect against 'ClickJacking' attacks.
            $response->header('X-Content-Type-Options', 'nosniff');
            $response->header('X-XSS-Protection', 1);
	    $response->header('Cache-Control', ['no-cache', 'no-store', 'must-revalidate']); // HTTP 1.1.
	    $response->header('Pragma', 'no-cache'); // HTTP 1.0.
	    $response->header('Expires', '0'); // Proxies.
        }
        return $response;
    }
}
