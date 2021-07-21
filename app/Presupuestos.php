<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuestos extends Model
{
    protected $table = 'presupuestos';
    protected $fillable = [
        'numero_de_presupuesto', 'contacto_id','precio_total','descuento','precio_final','fechaCaducidad',
    ];
    
}
