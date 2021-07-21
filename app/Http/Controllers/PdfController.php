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
use App\Empresa;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    //
    public function downloadPresupuesto($id){
        $presupuesto=Presupuestos::find($id);
        $descuento=$presupuesto->descuento;
        $presupuesto=Presupuestos::find($id);
        $numero_de_presupuesto = $presupuesto->numero_de_presupuesto;
        $todos_PS=Presupuestos_servicio::all();
        $todos_PP=Presupuestos_producto::all();
        $contacto=Contacto::findOrFail($presupuesto->contacto_id);
        $presupuestos_servicio=[];
        $presupuestos_producto=[];
        $path =  'img/logo.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        
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

        $empresa = Empresa::findOrFail('1');

        $pdf = PDF::loadView('presupuestos/presupuestos_pdf_2', compact(['presupuesto','presupuestos_producto','presupuestos_servicio','contacto','base64', 'empresa', 'descuento', 'validez']) );
        return $pdf->download("presupuesto $numero_de_presupuesto.pdf");
        return view('presupuestos/presupuestos_pdf_2', compact(['presupuesto','presupuestos_producto','presupuestos_servicio','contacto','base64', 'empresa', 'descuento', 'validez']));
    }

    public function downloadFactura($id){
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
        
        $pdf = PDF::loadView('facturas/facturas_pdf_2', compact(['factura','presupuestos_producto','presupuestos_servicio','contacto','direccion','impuestos','descuento', 'empresa' ]) );
        return $pdf->download("factura  $factura->numero_de_factura.pdf");
        return view('facturas/facturas_pdf_2', compact(['factura','presupuestos_producto','presupuestos_servicio','contacto','direccion','impuestos','descuento', 'empresa' ]));

    }
}
