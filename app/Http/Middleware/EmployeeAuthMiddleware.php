<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('employee_id')) {
            return redirect()->route('employee.login');
        }

        return $next($request);
    }
}
