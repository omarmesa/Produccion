<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRESUPUESTO | {{$presupuesto->numero_de_presupuesto}}</title>
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
        padding-left: 70%;
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

<body class="bg-white">
    <div class="col-md-12">
        <div class="col-md-12 ml-2 mr-2 mt-1">
            <div class="row col-md-12">
                <div class="col-md-5 pl-0">
                    <img src="{{url('img/logo.png')}}" alt="" style="height: 100px;">
                </div>
                <div class="col-md-3 offset-md-4">
                    <span class="derecha azul">{{ $empresa->email }}</span><br>
                    <span class="derecha azul">{{ $empresa->telefono }}</span>
                </div>
            </div>
            <br>
            <br>
            <div class="row col-md-12">
                <span class="col-md-3 float-left pl-0">FECHA: {{$presupuesto->created_at->toDateString()}}</span>
                <br>
                <span class="col-md-2 offset-md-7 float-rigth pr-0">
                    Presupuesto N.º :{{$presupuesto->numero_de_presupuesto}}
                </span>
            </div>
            <br>
            <div class="col-md-12 azul-claro">
                <span>
                    <h2 class="mb-0 pb-0">{{$contacto->persona_contacto}}</h2>
                </span>
                <span>Presupuesto válido hasta: {{ $presupuesto->fechaCaducidad}}</span>
            </div>
            
            <br>

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
                                <td class="derecha mderecha espacio">{{$servicio->precio}}€ X {{$servicio->cantidad}}</td>
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
                                    <ul> 
                                        <b>{{$producto->titulo}}</b>
                                        <li>{{$producto->observaciones}}</li>
                                    </ul>
                                </td>
                                <td class="derecha mderecha espacio ">{{$producto->precio}}€ X {{$producto->cantidad}}</td>
                            </tr>
                        @endforeach
                    @endif
                    
                    @if($descuento)
                        <tr class="tablita azul-claro">
                            <th class="text-right pr-3 tablita">Descuento</th>
                            <td class="derecha mderecha espacio ">{{$descuento}}%</td>
                        </tr>
                        <tr class="tablita azul-claro">
                            <th class="text-right pr-3 tablita">Base Imponible con descuento</th>
                            <td class="derecha mderecha espacio ">{{$presupuesto->precio_total}}€</td>
                        </tr>
                    @else
                        <tr class="tablita azul-claro">
                            <th class="text-right pr-3 tablita">Base Imponible</th>
                            <td class="derecha mderecha espacio ">{{$presupuesto->precio_total}}€</td>
                        </tr>
                    @endif

                    @php
                        $calc = 0;
                    @endphp

                    <tr class="tablita azul-oscuro ">
                        <th class="text-right pr-3 tablita"></th>
                        <td class="derecha mderecha espacio ">{{$presupuesto->precio_final}}€</td>
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
                <p class="pequena">
                    De acuerdo con la normativa RGPD UE 2016 / 679, de Protección de Datos de Carácter Personal, le
                    informo que los datos de este documento están
                    incluidos en un tratamiento del que es responsable DANIEL GONZÁLEZ DONAIRE y con el interés legítimo
                    de la ejecución de un contrato con la finalidad
                    de realizar la gestión fiscal, contable y administrativa de los servicios solicitados, así como el
                    envío de información y comunicaciones sobre los servicios
                    contratados y/o suministrados. Le informo también sobre sus derechos de acceso, rectificación,
                    cancelación y oposición que se podrá ejercer en el email:
                    info@iceond.com
                </p>
            </div>
            <br>
        </div>
    </div>


    </div>
    </div>
</body>

</html>