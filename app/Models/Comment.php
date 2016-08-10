<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Agrego los campos que tienen permisos de escritura
    protected $fillable = ['comment','todo_id'];

    //Creo un método que me permitirá acceder a la relación con los todos
    //como un comentario tiene un todo, el nombre lo deje en singular
    public function todo(){
      //Regreso la relación que tiene con los Todo
      return $this->belongsTo('\App\Models\Todo');

    }
}
