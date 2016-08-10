<?php

namespace App\Http\Middleware;

use Closure;

class OfficeHours
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
        //Aquí meteremos la validación que queremos que ocurra antes de pasar al
        //resto del proceso definido en la ruta


        //Esto permite que continue la ejecución definida en la ruta
        return $next($request);
    }
}
