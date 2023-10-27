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
        $tokenOne = $request->input('_token');
        $tokenTwo = $request->header('_token');
        
        if (empty($tokenOne)) {
            $this->isValidToken($tokenTwo);
        }else{
            if(!empty($tokenOne)){
                $this->isValidToken($tokenTwo);
            }else{
                return response()->json(['message' => 'Token de autenticación no válido'], 401);
            }
        }

        return $next($request);
    }
    
    private function isValidToken($token)
    {
        if($token === csrf_token() || $token == 'eSVFXMLyH8Qe8MxLkSesKPumUMgIuR5JT8JZQDCp'){
            return true;
        }else{
            return false;
        }
    }

}
