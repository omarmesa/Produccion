<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contacto';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'persona_contacto', 'empresa','nif', 'telefono','email','web','cliente','proveedor','observaciones',
    ];
}
