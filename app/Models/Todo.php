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

    /**
     * Relación entre un proyecto y un todo
     * @return relation
     */
    public function projects(){
        //Le mando como segundo argumento el nombre de la tabla porque no cumple
        //con las reglas para que laravel la tome automáticamente
        return $this->belongsToMany('\App\Models\Project','todo_project');
    }
}
