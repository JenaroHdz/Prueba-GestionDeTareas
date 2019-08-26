<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TareaUser extends Model
{
    protected $fillable = ['user_name', 'tarea'];
}
