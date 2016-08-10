<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
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

        //Validaremos que no se pueda cambiar de estatus el todo a menos que
        //sean horarios de oficina
        $hora = Carbon::now()->hour; //Obtengo la hora
        if ($hora > 18 || $hora < 9) {

            //Arrojo alerta
            session()->flash('flash_message','Esta acción no se puede realizar, estas fuera de horario');
            session()->flash('flash_message_type','danger');

            //Regreso a donde venía
            return back();
        }
        //Esto permite que continue la ejecución definida en la ruta
        return $next($request);
    }
}
