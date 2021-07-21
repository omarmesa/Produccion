<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Facturas;

class Impuestos extends Model
{
    protected $table = 'impuestos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'cantidad',
    ];

    public function facturas() {
        return $this->belongsTo(FacturaImpuestos::class, 'facturaimpuestos');
    }
}

