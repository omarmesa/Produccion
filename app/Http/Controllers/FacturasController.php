<?php

namespace App\Http\Controllers;

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

class FacturasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $facturas=Facturas::all();
        $facturas = $facturas->sortByDesc('created_at');
        $contactos=Contacto::all();
        return view('facturas/facturas', compact(['facturas','contactos']));
    }

    public function create(){//mostrar pregunta
        return view('facturas/facturas_create');
    }

    public function createp(){//create desde preupuesto
        $presupuestos=Presupuestos::all();
        $impuestos = Impuestos::all();
        return view('facturas/facturas_createp', compact(['presupuestos','impuestos']));
    }

    public function formularioPrecioPresupuesto(Request $request){
        $data['precio'] = Presupuestos::findOrFail($request->id)->precio_final;
        return $data;
    }

    public function formularioImpuestosPresupuesto(Request $request){
        if($request->coleccion_impuestos == null){
            $impuestos = null;
        }else{
            $impuestos= [];
            $i = 0;
            foreach($request->coleccion_impuestos as $id_impuesto){
                $impuesto = Impuestos::find($id_impuesto);
                $i++;
                $impuestos[$i] = $impuesto->cantidad;
            }
        }


        return $impuestos;
    }

    public function createc(){//create desde 0
        $contactos=Contacto::all();
        $servicios=Servicios::take(2)->get();
        $productos=Productos::take(2)->get();
        $impuestos = Impuestos::all();
        return view('facturas/facturas_createc', compact(['contactos','servicios','productos','impuestos']));
    }

    public function storep(){

        //Validacion de datos
        $data=request()->validate([
            'selectPresupuestoFactura' => 'required',
        ]);
        $impuestos = request()->validate([
            'impuestos' => 'nullable',
        ]);
        $precioTotal = Presupuestos::find($data['selectPresupuestoFactura'])->precio_final;

        //Crear factura
        $time = Carbon::now();
        $presupuesto = Presupuestos::find($data['selectPresupuestoFactura']);
        $factura = Facturas::create([
            'contacto_id' => $presupuesto->contacto_id,
            'presupuesto_id'=>$presupuesto->id,
            'precio_total' => $precioTotal,
            'descuento' => $presupuesto->descuento,
            // 'precio_final' =>  $calc,
        ]);

        $impuestos_final_factura=0;
        //Impuestos

        if($impuestos != null){
            // dd($impuestos);
            //Impuestos - facturas
            foreach($impuestos['impuestos'] as $id_impuesto){
                // dd($id_impuesto);
                $impuesto = Impuestos::find($id_impuesto);
                $precio = $impuesto->cantidad*$precioTotal/100;
                // dd($precio);
                $facturaimpuestos = FacturaImpuestos::create([
                    'factura_id' => $factura->id,
                    'impuesto_id' => $id_impuesto,
                    'precio' => $precio,
                ]);

                $impuestos_final_factura += $facturaimpuestos->precio;
            }
            // dd($impuestos_final_factura);


        }

        $calc = (float)$impuestos_final_factura + $precioTotal;


        //Update factura
        $numero = Carbon::createFromFormat('Y-m-d H:i:s', $time)->year;
        $factura->update([
            'numero_de_factura' => $numero."-".str_pad($factura->id, 4, '0', STR_PAD_LEFT),
            'precio_final' => $calc,
        ]);

        return redirect()->route('facturas.index');
    }

    public function storec(){

        //Validacion de datos
        $data=request()->validate([
            'contacto' => 'required',
            'precioTotal' => 'required|numeric',
            'descuentoPresupuesto' => 'nullable|numeric',
            'fecha'=>'nullable|date',
        ]);

        
        $contacto = Contacto::where('persona_contacto', '=', $data['contacto'])->first();
        $data['contacto'] = $contacto->id;

        // COGER TODO BUSCARLO Y LO QUE SEA PRODUCTO METERLO A ARRAY DE PRODUCTOS Y LO QUE SEA SERVICIO A LA DE SERVICIOS
        //AL HACER DD daraProductos solo coge el ultimo elemento que hay añadido a la factura, tiene que cogerlos todos en un array
        $dataProductos = request()->validate([
            'undefined' => 'nullable',
        ]);
        $dataProductos = request()->undefined;
        unset($dataProductos['[object Object']);
        $lista_productos = array();
        $lista_servicios = array();

        foreach($dataProductos as $pro=>$campos){
            $p=Productos::where('nombre', '=', $pro)->first();
            $s=Servicios::where('titulo_servicio', '=', $pro)->first();
            if($p){
                array_push($lista_productos, $p);
            }else{
                array_push($lista_servicios, $s);
            }
        }
        
        $impuestos_id = request()->validate([
            'impuestos' => 'nullable',
        ]);

        $time = Carbon::now();
        $numero = Carbon::createFromFormat('Y-m-d H:i:s', $time)->year;

        if (isset($data['descuentoPresupuesto'])){
            $precio_final = $data['precioTotal']-(($data['precioTotal'] * $data['descuentoPresupuesto'])/100);
        }else{
            $precio_final = $data['precioTotal'];
        }

        //Se genera el presupuesto
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

        $presupuesto->update([
            'numero_de_presupuesto' => $numero_de_presupuesto,
            'contacto_id' => $data['contacto'],
            'precio_total'=> $data['precioTotal'],
            'descuento' => $data['descuentoPresupuesto'],
            'precio_final' =>  $precio_final,
            'fechaCaducidad'=> $data['fecha'],
        ]);

        foreach ($lista_servicios as $servicios){
            foreach ($servicios as $servicio){
                Presupuestos_servicio::create([
                    'id_presupuesto' => $presupuesto->id,
                    'id_servicio' => $servicio['id'],
                    'titulo' => Servicios::findOrFail($servicio['id'])->titulo_servicio,
                    'cantidad' => $servicio['cantidad'],
                    'observaciones'=> $servicio['observaciones'],
                    'precio' => $servicio['precio'],
               ]);
            }
        }

        // dd($dataProductos['productos']);
            foreach ($lista_productos as $productos){
                foreach ($productos as $producto){
                    Presupuestos_producto::create([
                        'id_presupuesto' => $presupuesto->id,
                        'id_producto' => $producto['id'],
                        'titulo' => Productos::findOrFail($producto['id'])->nombre,
                        'cantidad' => $producto['cantidad'],
                        'observaciones'=> $producto['observaciones'],
                        'precio' => $producto['precio'],
                    ]);
                } 
            }
        

        ///Se genera la factura a traves del presupuesto

        $factura = Facturas::create([
            'contacto_id' => $presupuesto->contacto_id,
            'presupuesto_id'=>$presupuesto->id,
            'precio_total' =>$presupuesto->precio_final,
            'descuento' => $presupuesto->descuento,
            // 'precio_final' => $calc,
        ]);

        $impuestos_final_factura=0;
        //Impuestos - facturas
        foreach($impuestos_id['impuestos'] as $id_impuesto){
            // dd($id_impuesto);
            $impuesto = Impuestos::find($id_impuesto);
            $precio = $impuesto->cantidad*$precio_final/100;
            // dd($precio);
            $facturaimpuestos = FacturaImpuestos::create([
                'factura_id' => $factura->id,
                'impuesto_id' => $id_impuesto,
                'precio' => $precio,
            ]);

            $impuestos_final_factura += $facturaimpuestos->precio;
        }
        // dd($impuestos_final_factura);

        $precio_final_factura = $presupuesto->precio_final + $impuestos_final_factura;
        $factura->update([
            'numero_de_factura' => $numero."-".str_pad($factura->id, 4, '0', STR_PAD_LEFT),
            'precio_final' => $precio_final_factura,
        ]);



        return redirect()->route('facturas.index');

    }

    public function destroy($id){
        $factura=Facturas::find($id);
        $factura->delete();
        return redirect()->route('facturas.index');
    }

    public function info($id){
        $factura=Facturas::find($id);
        $descuento=$factura->descuento;
        $presupuesto=Presupuestos::find($factura->presupuesto_id);
        $todos_PS=Presupuestos_servicio::all();
        $todos_PP=Presupuestos_producto::all();
        $contacto=Contacto::findOrFail($presupuesto->contacto_id);
        $direcciones = Direcciones::all();
        foreach($direcciones as $d){
            if($d->id_cliente == $contacto->id){
                $direccion = $d;
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

        //factura impuestos
        $facturasImpuestos = FacturaImpuestos::where('factura_id', $factura->id)->get();

        // EMPRESA CONFIG
        $empresa = Empresa::findOrFail('1');

        return view('facturas/facturas_info', compact(['factura','presupuestos_producto','presupuestos_servicio','contacto','direccion','impuestos','descuento', 'facturasImpuestos', 'empresa']));
    }

    public function search(){
        $data= request()->validate([
            'search' => 'nullable',
        ]);
        $query=$data['search'];
        $facturas = DB::select("SELECT * FROM `factura` WHERE `numero_de_factura` LIKE '%$query%' ORDER BY `numero_de_factura` ASC");
        $contactos=Contacto::all();
        return view('facturas/facturas', compact(['facturas','contactos']));
    }

    public function searchCliente(Request $request){

        return Contacto::where('persona_contacto', 'like', '%'.$request->val.'%')->get();

    }

    public function searchProductos(Request $request){

        $MyObjects = array();

        $productos = Productos::where('nombre', 'like', '%'.$request->val.'%')->get();
        $servicios = Servicios::where('titulo_servicio', 'like', '%'.$request->val.'%')->get();

        // foreach ($results as $result){
        //     $MyObjects->push($result);
        // }

        // foreach ($results2 as $result){
        //     $MyObjects->push($result);
        // }

        $response = [
            'productos' => $productos,
            'servicios' => $servicios,
        ];


        return response()->json($response);

    }

    public function searchServicios(Request $request){


    }

}
