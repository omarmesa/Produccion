<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaImpuestos extends Model
{
    protected $table = 'facturaImpuestos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'factura_id', 'impuesto_id', 'precio'
    ];
}
