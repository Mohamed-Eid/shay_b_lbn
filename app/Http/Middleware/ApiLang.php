<?php

namespace App\Http\Middleware;

use Closure;

class ApiLang
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
        $locale = request()->header('lang');
        if($locale){
            app()->setLocale($locale);
        }else{
            app()->setLocale('en');
        }
        return $next($request);
    }
}
