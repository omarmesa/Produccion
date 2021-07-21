<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'nombre', 'sku','precio', 'stock','descripcion',
    ];
    
}
