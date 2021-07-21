<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Impuestos;

class Facturas extends Model
{
    protected $table = 'factura';
    protected $fillable = [
        'numero_de_factura', 'contacto_id','presupuesto_id','precio_total','descuento','precio_final',
    ];

    // public function impuestos() {
    //     return $this->hasMany(Impuestos::class, 'facturaimpuestos');
    // }
}
