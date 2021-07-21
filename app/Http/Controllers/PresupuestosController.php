<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Presupuestos;
use App\Presupuestos_producto;
use App\Presupuestos_servicio;
use App\Productos;
use App\Servicios;
use App\Empresa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\FacturaImpuestos;
use App\Impuestos;

class PresupuestosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $presupuestos=Presupuestos::all();
        $presupuestos = $presupuestos->sortByDesc('created_at');
        $contactos=Contacto::all();
        return view('presupuestos/presupuestos', compact(['presupuestos','contactos']));
    }
    public function create(){
        $contactos=Contacto::all();
        $servicios=Servicios::all();
        $productos=Productos::all();
        return view('presupuestos/presupuestos_create', compact(['contactos','servicios','productos']));
    }
    public function store(){
        $data=request()->validate([
            'contacto' => 'required',
            'precioTotal' => 'required|numeric',
            'descuentoPresupuesto' => 'nullable',
            'precioConDescuento' => 'nullable',
            'fecha'=>'nullable|date',
        ]);

        $contacto = Contacto::where('persona_contacto', '=', $data['contacto'])->first();
        $data['contacto'] = $contacto->id;

        $dataServicios = request()->validate([
            'servicios' => 'nullable',
        ]);
        $dataProductos = request()->validate([
            'productos' => 'nullable',
        ]);
        $time = Carbon::now();
        $numero = Carbon::createFromFormat('Y-m-d H:i:s', $time)->year;
        $presupuestos = Presupuestos::all();
        if (isset($data['descuentoPresupuesto'])){
            $precio_final = $data['precioTotal']-(($data['precioTotal'] * $data['descuentoPresupuesto'])/100);
        }else{
            $precio_final = $data['precioTotal'];
        }
        
        $presupuesto= Presupuestos::create([
            //'numero_de_presupuesto' => $numero_de_presupuesto,
            'contacto_id' => $data['contacto'],
            'precio_total'=> $data['precioTotal'],
            'descuento' => $data['descuentoPresupuesto'],
            'precio_final' =>  $precio_final,
            'fechaCaducidad'=> $data['fecha'], 
        ]);

        $presupuestosCantidad = $presupuesto->id;
        $numero_de_presupuesto = "$numero-$presupuestosCantidad";


        if(!isset($data['fecha'])){
            $data['fecha'] = $presupuesto->created_at->addMonths(1)->toDateString();
        }
        
        $presupuesto->update([
            'numero_de_presupuesto' => $numero_de_presupuesto,
            'contacto_id' => $data['contacto'],
            'precio_total'=> $data['precioTotal'],
            'descuento' => $data['descuentoPresupuesto'],
            'precio_final' =>  $precio_final,
            'fechaCaducidad'=> $data['fecha'], 
        ]);

        foreach ($dataServicios as $servicios){
            foreach ($servicios as $servicio){
               $presupuesto_servicio=Presupuestos_servicio::create([
                    'id_presupuesto' => $presupuesto->id,
                    'id_servicio' => $servicio['id'],
                    'titulo' => Servicios::findOrFail($servicio['id'])->titulo_servicio,
                    'cantidad' => $servicio['cantidad'],
                    'observaciones'=> $servicio['observaciones'],
                    'precio' => $servicio['precio'],
               ]);
            }
        }

        foreach ($dataProductos as $productos){
            foreach ($productos as $producto){
               $presupuesto_producto=Presupuestos_producto::create([
                'id_presupuesto' => $presupuesto->id,
                'id_producto' => $producto['id'],
                'titulo' => Productos::findOrFail($producto['id'])->nombre,
                'cantidad' => $producto['cantidad'],
                'observaciones'=> $producto['observaciones'],
                'precio' => $producto['precio'],
               ]);
               $productodb = Productos::find($producto['id']);
               $productodb->update([
                   'stock'=>$productodb->stock - $presupuesto_producto->cantidad,
               ]);
            }
        }
       
        return redirect()->route('presupuestos.index');
    }

    public function destroy($id){
        $presupuesto=Presupuestos::find($id);
        $presupuesto->delete();
        return redirect()->route('presupuestos.index');
    }

    public function info($id){
        $presupuesto=Presupuestos::find($id);
        $todos_PS=Presupuestos_servicio::all();
        $todos_PP=Presupuestos_producto::all();
        $descuento=$presupuesto->descuento;
        $contacto=Contacto::findOrFail($presupuesto->contacto_id);
        $presupuestos_servicio=[];
        $presupuestos_producto=[];

        foreach($todos_PS as $presupuesto_servicio){
            if($presupuesto->id == $presupuesto_servicio->id_presupuesto){
                array_push($presupuestos_servicio , $presupuesto_servicio);
            }
        }

        foreach($todos_PP as $presupuesto_productos){
            if($presupuesto->id == $presupuesto_productos->id_presupuesto){
                array_push($presupuestos_producto , $presupuesto_productos);
            }
        }

        $impuestos=[];
        $impuestosfactura = FacturaImpuestos::where('factura_id','=',$id)->get();
        //dd($impuestosfactura[1]->impuesto_id);
        foreach ($impuestosfactura as $impuestofactura){
            $id_impuesto = $impuestofactura->impuesto_id;
            $impuesto = Impuestos::find($id_impuesto);
            array_push($impuestos,$impuesto);
        }
        
        // EMPRESA CONFIG
        $empresa = Empresa::findOrFail('1');

        return view('presupuestos/presupuestos_info', compact(['presupuesto','presupuestos_producto','presupuestos_servicio','contacto', 'empresa', 'descuento', 'impuestos']));
    }
    public function formularioPrecioProducto(Request $request){
        $data['precio'] = Productos::findOrFail($request->id)->precio;
        $data['descripcion'] = Productos::findOrFail($request->id)->descripcion;
        return $data;
    }
    public function formularioPrecioServicio(Request $request){
        $data['precio'] = Servicios::findOrFail($request->id)->coste_servicio;
        $data['descripcion'] = Servicios::findOrFail($request->id)->descripcion;
        return $data;
    }
    public function formularioProductoStock(Request $request){
        return Productos::findOrFail($request->id)->stock;
    }

    /* public function edit($id){
        $presupuesto=Presupuestos::find($id);
        $todos_PS=Presupuestos_servicio::all();
        $todos_PP=Presupuestos_producto::all();
        return view('presupuestos/presupuestos_info', compact(['presupuesto']));
    } */

    public function search(){
        $data= request()->validate([
            'search' => 'nullable',
        ]);
        $query=$data['search'];
        $presupuestos = DB::select("SELECT * FROM `presupuestos` WHERE `numero_de_presupuesto` LIKE '%$query%' ORDER BY `numero_de_presupuesto` ASC");
        $contactos=Contacto::all();
        return view('presupuestos/presupuestos', compact(['presupuestos','contactos']));
    }

}
