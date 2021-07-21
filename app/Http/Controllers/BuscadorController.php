<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;
use App\Direcciones;
use App\FacturaImpuestos;
use App\Facturas;
use App\Impuestos;
use App\Presupuestos;
use App\Presupuestos_producto;
use App\Presupuestos_servicio;
use App\Productos;
use App\Servicios;
use App\Empresa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Foreach_;

class BuscadorController extends Controller
{

    public function searchCliente(Request $request){

        return Contacto::where('persona_contacto', 'like', '%'.$request->val.'%')->get();
    
    }

}
