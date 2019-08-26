<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = [
        'descripcion',
        'prioridad',
        'fecha_inicio',
        'fecha_fin',
        'id_user',
        'status'            
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
