<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //mass
    protected $fillable = ['name','user_id'];

    /**
     * Método que genera la relación entre proyecto y usuarios
     * @return query builder
     */
    public function manager(){
        //como segundo parametro le pasamos el id porque manager no es una tabla
        //y si no lo hago buscara manager_id
        return $this->belongsTo('\App\User','user_id');
    }
}
