<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTURA | {{$factura->numero_de_factura}}</title>
    <style>
    .azul-claro {
        background-color: #C6D9F1 !important;
    }

    .azul-oscuro {
        background-color: #8DB3E2 !important;
    }

    .derecha {
        float: right;
    }

    .izquierda {
        float: left;
    }

    .azul {
        color: blue;
        text-decoration: underline;
        margin-right: 2%;
    }

    .pequena {
        font-size: small;
    }

    .mderecha {
        margin-right: 2%;
    }

    .mizquierda {
        margin-left: 2%;
    }

    .marriba {
        margin-top: 2%;
    }

    .mabajo {
        margin-top: 0px;
    }

    .espacio {
        padding-left: 80%;
    }

    .tablita {
        /* border: 1px solid black; */
        border-collapse: collapse;
    }

    .alturaPequena {
        height: 10px;
    }
    </style>
</head>

<body>
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><a href="{{ route('facturas.index') }}" class="icon-circle-left2 text-teal-400 mr-2"
                        style="font-size: 25px;"></a> <span class="font-weight-semibold">Factura
                        {{$factura->numero_de_factura}}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div>
                <a href="{{route('pdf.downloadFactura',['id'=> $factura->id])}}"><i class=" text-teal icon-file-pdf" style="font-size: 25px;"></i></a>
            </div>
        </div>
    </div>
    <div class="card col-md-12">
        <div class="col-md-12 ml-2 mr-2 mt-1">
            <div class="col-md-12">
                <div class="col-md-12 ml-2 mr-2 mt-1">
                    <div class="row col-md-12">
                        <div class="col-md-5 pl-0">
                            <span><h4 class="mb-0 pb-0">DANIEL GONZ??LEZ DONAIRE</h4></span>
                            <span>NIF 48100949Z</span><br>
                            <span> C/ Riu Ebre n??.29 b</span><br>
                            <span>08800-Vilanova i la Geltr??</span>
                        </div>
                        <div class="col-md-3 offset-md-4">
                            <span class="derecha azul">{{ $empresa->email }}</span><br>
                            <span class="derecha azul">{{ $empresa->telefono }}</span>
                        </div>
                    </div>
                </div>
            </div>    
                    <br>
                    <br>
                    <div class="row col-md-12">
                        <span class="col-md-3 float-left pl-0">FECHA: {{$factura->created_at->toDateString()}}</span>
                        <br>
                        <span class="col-md-2 offset-md-7 float-rigth pr-0">FACTURA N.?? :
                            {{$factura->numero_de_factura}}</span>
                    </div>
                    <br>
                    <div class="col-md-12 azul-claro">
                        <span>
                            <h2 class="mb-0 pb-0">{{$contacto->persona_contacto}}</h2>
                        </span>
                        <span>{{$direccion->calle}}, {{$direccion->numero}}</span><br>
                        <span>{{$direccion->cp}}-{{$direccion->poblacion}}</span><br>
                        <span>{{$contacto->nif}}</span><br>
                    </div><br>
                    <div class="col-md-12 p-0">
                        <table style="width:100%" class="col-md-12 mt-3">
                            @if(!empty($presupuestos_servicio))
                                <tr class="text-center azul-oscuro ">
                                    <th class="tablita">DESCRIPCION SERVICIO</th>
                                    <th class="tablita">COSTE SERVICIO</th>
                                </tr>
                                @foreach($presupuestos_servicio as $servicio)
                                    <tr class="tablita">
                                        <td class="tablita">
                                            <ul> <b>{{$servicio->titulo}}</b>
                                                <li>{{$servicio->observaciones}}</li>
                                            </ul>
                                        </td>
                                        <td class="derecha mderecha espacio">{{$servicio->precio}}??? X {{$servicio->cantidad}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            @if(!empty($presupuestos_producto))
                                <tr class="text-center azul-oscuro ">
                                    <th class="tablita">DESCRIPCION PRODUCTO</th>
                                    <th class="tablita">COSTE PRODUCTO</th>
                                </tr>
                                @foreach ($presupuestos_producto as $producto)
                                    <tr class="tablita">
                                        <td class="tablita">
                                            <ul> <b>{{$producto->titulo}}</b>
                                                <li>{{$producto->observaciones}}</li>
                                            </ul>
                                        </td>
                                        <td class="derecha mderecha espacio ">{{$producto->precio}}??? X {{$producto->cantidad}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            @if($descuento)
                                <tr class="tablita azul-claro">
                                    <th class="text-right pr-3 tablita">Descuento</th>
                                    <td class="derecha mderecha espacio ">{{$descuento}}%</td>
                                </tr>
                                <tr class="tablita azul-claro">
                                    <th class="text-right pr-3 tablita">Base Inponible con descuento</th>
                                    <td class="derecha mderecha espacio ">{{$factura->precio_total}}???</td>
                                </tr>
                            @else
                                <tr class="tablita azul-claro">
                                    <th class="text-right pr-3 tablita">Base Inponible</th>
                                    <td class="derecha mderecha espacio ">{{$factura->precio_total}}???</td>
                                </tr>
                            @endif

                            @php
                                $calc = 0;
                            @endphp

                            @forelse ($impuestos as $impuesto)
                                <tr class="tablita azul-claro">
                                    <th class="text-right pr-3 tablita">{{$impuesto->nombre}} ({{$impuesto->cantidad}}%)
                                </th>
                                @if(strpos(strtoupper($impuesto->nombre), 'IVA')!== false)
                                    @php
                                        $iva = $impuesto->cantidad;
                                        $calc = $factura->precio_total + (($iva/100) * $factura->precio_total);
                                    @endphp
                                    <td class="derecha mderecha espacio "> {{round($calc, 2)}}???</td>
                                @endif
                                @if(strpos(strtoupper($impuesto->nombre), 'IRPF')!== false)
                                @php
                                if (isset($iva)){
                                $irpf = $impuesto->cantidad;
                                $irpfcalc = ($irpf/100) * $calc;
                                $calc = $calc + (($irpf/100) * $calc);
                                }else{
                                $irpf = $impuesto->cantidad;
                                $irpfcalc = ($irpf/100) * $factura->precio_total;
                                $calc = $factura->precio_total + (($irpf/100) * $factura->precio_total);
                                }
                                @endphp
                                <td class="derecha mderecha espacio "> {{round($irpfcalc, 2)}}???</td>
                                @endif
                                @if(strpos(strtoupper($impuesto->nombre), 'IRPF') === false and
                                strpos(strtoupper($impuesto->nombre), 'IVA') === false)
                                @php
                                if(isset($iva) or isset($irpf)){
                                $i = $impuesto->cantidad;
                                $icalc = ($i/100) * $calc;
                                $calc = $calc + (($i/100) * $calc);
                                }else{
                                $i = $impuesto->cantidad;
                                if ($calc == 0){
                                $icalc = ($i/100) * $factura->precio_total;
                                $calc = $factura->precio_total + (($i/100) * $factura->precio_total);
                                }else{
                                $icalc = ($i/100) * $calc;
                                $calc = $calc + (($i/100) * $calc);
                                }
                                }
                                @endphp
                                <td class="derecha mderecha espacio "> {{round($icalc, 2)}}???</td>
                                @endif
                            </tr>

                            @empty
                            @endforelse




                            <tr class="tablita azul-oscuro ">
                                <th class="text-right pr-3 tablita"></th>
                                <td class="derecha mderecha espacio ">{{$factura->precio_final}}???</td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <hr>
                    <div class="col-md-12 mt-2 p-0">
                        <span>FORMA DE PAGO</span><br><br>
                        <span>Por transferencia bancaria a: BANC SABADELL (IBAN): <b> {{$empresa->iban}}</b></span>
                    </div><br>
                    <div class="col-md-12 mt-2 p-0">
                        <p class="pequena"> De acuerdo con la normativa RGPD UE 2016 / 679, de Protecci??n de Datos de
                            Car??cter Personal, le informo que los datos de este documento est??n
                            incluidos en un tratamiento del que es responsable DANIEL GONZ??LEZ DONAIRE y con el inter??s
                            leg??timo de la ejecuci??n de un contrato con la finalidad
                            de realizar la gesti??n fiscal, contable y administrativa de los servicios solicitados, as??
                            como el env??o de informaci??n y comunicaciones sobre los servicios
                            contratados y/o suministrados. Le informo tambi??n sobre sus derechos de acceso,
                            rectificaci??n, cancelaci??n y oposici??n que se podr?? ejercer en el email:
                            info@iceond.com </p>
                    </div><br>
                </div>
            </div>


        </div>
    </div>
</body>

</html>