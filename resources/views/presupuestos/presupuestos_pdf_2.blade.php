<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRESUPUESTO | {{$presupuesto->numero_de_presupuesto}}</title>
    <style>
        
        table{
            width: 100%;
            /* border-collapse: separate; */
            /* border-spacing: 0 1em; */
        }

        .derecha {
            float: right;
        }
        
        .azul-claro {
            background-color: #C6D9F1 !important;
        }

        .azul-oscuro {
            background-color: #8DB3E2 !important;
        }

        .pequena {
            font-size: small;
        }

        .align-right{
            text-align: right;
        }
    
    </style>
</head>

<body>

    <!-- INFORMACION EMPRESA -->
    <table>
        <tr style="width:70%;">
            <td>
                <img style="height: 100px;" src="{{ url('img/logo.png') }}" alt="">
            </td>
            <td>
                <span class="derecha">{{ $empresa->email }}</span><br>
                <span class="derecha">{{ $empresa->telefono }}</span>
            </td>
        </tr>
        <tr style="width:30%;">
            <td>
                <span>FECHA: {{$presupuesto->created_at->toDateString()}}</span>
            </td>
            <td>
                <span class="derecha">Presupuesto N.º :{{$presupuesto->numero_de_presupuesto}}</span>
            </td>
        </tr>
    </table>

    <!-- INFORMACION CONTACTO -->
    <table>
        <tr>
            <div class="azul-claro" style="padding: 0.5em 0.5em 0.5em 0.5em;">
                <h2>{{$contacto->persona_contacto}}</h2>
                <span>Presupuesto válido hasta: <b>{{ $presupuesto->fechaCaducidad}}</b></span>
            </div>
        </tr>
    </table>

    <!-- INFORMACION FACTURA -->

    <table>
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
                    <td class="align-right">{{$servicio->precio}}€ X {{$servicio->cantidad}}</td>
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
                    <td class="align-right">{{$producto->precio}}€ X {{$producto->cantidad}}</td>
                </tr>
            @endforeach
        @endif
        
        @if($descuento)
            <tr class="tablita azul-claro">
                <th class="align-right">Descuento</th>
                <td class="align-right">{{$descuento}}%</td>
            </tr>
            <tr class="tablita azul-claro">
                <th class="align-right">Base Imponible con descuento</th>
                <td class="align-right">{{$presupuesto->precio_total}}€</td>
            </tr>
        @else
            <tr class="tablita azul-claro">
                <th class="align-right">Base Imponible</th>
                <td class="align-right">{{$presupuesto->precio_total}}€</td>
            </tr>
        @endif

        @php
            $calc = 0;
        @endphp

        <tr class="tablita azul-oscuro ">
            <th class="text-right pr-3 tablita"></th>
            <td class="align-right">{{$presupuesto->precio_final}}€</td>
        </tr>
    </table>

    <!-- INFORMACION DE PAGO -->
<br>
<hr>
<br>

    <div class="">
        <span>FORMA DE PAGO</span><br><br>
        <span>Por transferencia bancaria a: BANC SABADELL (IBAN): <b> {{$empresa->iban}}</b></span>
    </div>
    <br>
    <div class="">
        <p class="pequena">
            De acuerdo con la normativa RGPD UE 2016 / 679, de Protección de Datos de
            Carácter Personal, le informo que los datos de este documento están
            incluidos en un tratamiento del que es responsable DANIEL GONZÁLEZ DONAIRE y con el interés
            legítimo de la ejecución de un contrato con la finalidad
            de realizar la gestión fiscal, contable y administrativa de los servicios solicitados, así como
            el envío de información y comunicaciones sobre los servicios
            contratados y/o suministrados. Le informo también sobre sus derechos de acceso, rectificación,
            cancelación y oposición que se podrá ejercer en el email:
            info@iceond.com 
        </p>
    </div><br>


</body>

</html>