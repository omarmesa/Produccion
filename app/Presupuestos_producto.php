<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuestos_producto extends Model
{
    protected $table = 'presupuestos_producto';
    protected $fillable = [
        'id_presupuesto', 'id_producto','titulo','cantidad','observaciones','precio',
    ];
    
}
