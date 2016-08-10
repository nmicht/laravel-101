<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //Permitiendo que los campos nombre, estatus y color puedan ser editados con el create de eloquent
    protected $fillable = ['name','status','color'];

    //Creo un método que me permitirá acceder a la relación con los comentarios
    //como un todo tiene muchos comentarios, el nombre lo pongo en plural
    public function comments(){
      //Regreso la relación que tiene con los comentarios
      return $this->hasMany('\App\Models\Comment');

    }
}
