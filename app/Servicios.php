<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected $table = 'servicios';
    protected $fillable = [
        'titulo_servicio', 'coste_servicio','descripcion',
    ];
    
}
