<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table = 'configuracion_documentos';
    protected $fillable = [
        'titulo', 'configuracion',
    ];
    
}
