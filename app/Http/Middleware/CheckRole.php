<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and has the required role
        $role_name = ['admin', 'vendor','client'];
        if ($request->user() && in_array($request->user()->role, $role_name)) {
            return $next($request);
        }

        // Redirect or abort the request if the user doesn't have the required role
        return redirect()->route('home')->with('error', 'Unauthorized access');
    }
}
