<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ValidateId
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->id;
        if (!is_numeric($id) || $id < 0) {
            //Tirar hacia atrás
            return response('ERROR', status: 422);
        }
        //Dejar de seguir
        return $next($request);
    }
}
