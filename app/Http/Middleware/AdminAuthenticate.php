<?php

namespace App\Http\Middleware;

use Closure;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token=$request->cookie('token');
        $result=JWTToken::ReadToken($token);

        if($result=='unauthorized'){
            return redirect('/adminLogin');
        }else{
            if($result->userRole==1){
                $request->headers->set('email',$result->userEmail);
                $request->headers->set('id',$result->userID);
            }
            return $next($request);
        }
    }
}
