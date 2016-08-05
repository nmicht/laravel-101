<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //Permitiendo que los campos nombre, estatus y color puedan ser editados con el create de eloquent
    protected $fillable = ['name','status','color'];
}
