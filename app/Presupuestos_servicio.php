<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuestos_servicio extends Model
{
    protected $table = 'presupuestos_servicio';
    protected $fillable = [
        'id_presupuesto', 'id_servicio','titulo','cantidad','observaciones','precio',
    ];
    
}
