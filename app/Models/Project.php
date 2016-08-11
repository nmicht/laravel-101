<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //mass
    protected $fillable = ['name','user_id'];
}
