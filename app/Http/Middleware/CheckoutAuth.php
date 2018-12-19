<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class CheckoutAuth
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
        $patron = $request->patron;
        $equipment = $request->equipment;

        if ($patron->canCheckout($equipment->group) === false) 
            return redirect()->to( route('equipment.admin.patron.show', $patron->id) );

        return $next($request);
    }
}
