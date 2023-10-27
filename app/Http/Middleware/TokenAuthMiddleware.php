<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $token = $request->input('_token');
        $token = $request->header('_token');
        

        if (empty($token) || !$this->isValidToken($token)) {

            return response()->json(['message' => 'Token de autenticación no válido', 't' => $token], 401);
        }

        return $next($request);

    }
    
    private function isValidToken($token)
    {
        // return $token === csrf_token(); 
        return $token ==='eSVFXMLyH8Qe8MxLkSesKPumUMgIuR5JT8JZQDCp';
    }
}
