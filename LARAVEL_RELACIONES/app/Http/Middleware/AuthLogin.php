<?php

namespace App\Http\Middleware;

use App\Models\Owner;
use Closure;
use Illuminate\Http\Request;

class AuthLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $user = Owner::where('api_token', '=', $token)->first();
        if (!empty($user)){
            return $next($request);
        }
        return response()->json([
            "success" => false,
            "message" => "Necesita iniciar sesión"
        ]);
    }
}
