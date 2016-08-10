<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Agrego los campos que tienen permisos de escritura
    protected $fillable = ['comment','todo_id'];
}
