<?php

namespace Iblacker\NovaLogViewer\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Iblacker\NovaLogViewer\Tool;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
    public function handle(Request $request, Closure $next): Response
    {
        return app(Tool::class)->authorize($request)
            ? $next($request)
            : abort(403);
    }
}
