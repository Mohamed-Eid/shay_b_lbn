<?php

namespace App\Http\Middleware;

use App\Client;
use App\Traits\ApiResponse;
use Closure;

class AuthorizedClient
{
    use ApiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = request()->header('x-api-key');
        $client = Client::where('api_token',$token)->first();

        if($client)
        {
            request()->client = $client;
            return $next($request);
        }
        return $this->errorResponse([__('site.plz_login_first')], 401);    
    }
}
