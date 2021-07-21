<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    protected $table = 'direcciones';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'calle', 'numero','piso', 'cp','provincia','poblacion','pais','id_cliente',
    ];
}
