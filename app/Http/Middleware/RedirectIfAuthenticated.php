<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
       if(auth('web')->check()){
return redirect(RouteServiceProvider::HOME);
       }else if(auth('admin')->check()){
return redirect(RouteServiceProvider::ADMIN);
       }else if(auth('doctor')->check()){
              return redirect(RouteServiceProvider::Doctor);
       }else if(auth('rayemployee')->check()){
              return redirect(RouteServiceProvider::RAYEMPLOYEE);
       }else if(auth('laboratorEmploye')->check()){
              return redirect(RouteServiceProvider::LABBORATOREEMPLOYEE);
       }else if(auth('Patient')->check()){
              return redirect(RouteServiceProvider::PATIENT);
       }
        return $next($request);
    }
}
