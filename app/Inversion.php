<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inversion extends Model
{
    
    protected $table = 'inversions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'producto', 'cantidad','precio', 'proveedor',
    ];
}
