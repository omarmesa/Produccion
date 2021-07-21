<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTURA | {{$factura->numero_de_factura}}</title>
    <style>
        .align-right{
            text-align: right;
        }

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

        #tabla-productos th.ancho {
            width: 75%
        }

        #tabla-productos th.estrecho {
            width: 25%
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>

    <!-- TABLAS INFORMACION 1 -->
    <table>
        <tr style="width:80%;">
            <td>
                <span><h3>{{ $empresa->nombre }}</h3></span>
                <span>NIF {{ $empresa->nif }}</span><br>
                <span>{{ $empresa->direccion }}</span><br>
                <span>{{ $empresa->poblacion }}</span>
            </td>
            <td>
                <br><span class="derecha"><a href="mailto:{{ $empresa->email }}">{{ $empresa->email }}</a></span>
                <br><br><span class="derecha"><a href="tel:{{ $empresa->telefono }}">{{ $empresa->telefono }}</a></span>
            </td>
        </tr>
    </table>

    <table style="padding-top:20px;">
        <tr style="width:20%;">
            <td>
                <span>FECHA: {{$factura->created_at->toDateString()}}</span>
            </td>
            <td>
                <span class="derecha">FACTURA N.º : {{$factura->numero_de_factura}}</span>
            </td>
        </tr>
    </table>

    <!-- TABLA CONTACTO -->
    <table>
        <tr>
            <div class="azul-claro" style="padding: 0.5em 0.5em 0.5em 0.5em;">
                <h2>{{$contacto->persona_contacto}}</h2>
                <span>{{$direccion->calle}}, {{$direccion->numero}}</span><br>
                <span>{{$direccion->cp}}-{{$direccion->poblacion}}</span><br>
                <span>{{$contacto->nif}}</span><br>
            </div>
        </tr>
    </table>

    <!-- TABLA DE PRODUCTOS -->

    <table id="tabla-productos">

        @if(!empty($presupuestos_servicio))
            <tr class="text-center azul-oscuro ">
                <th class="tablita ancho">DESCRIPCION SERVICIO</th>
                <th class="tablita estrecho">COSTE SERVICIO</th>
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
                <td class="align-right">{{$factura->precio_total}}€</td>
            </tr>
        @else
            <tr class="tablita azul-claro">
                <th class="align-right">Base Imponible</th>
                <td class="align-right">{{$factura->precio_total}}€</td>
            </tr>
        @endif

        @php
            $calc = 0;
        @endphp

        <!-- IMPUESTOS -->

        @forelse ($impuestos as $impuesto)
            <tr class="azul-claro">
                <th class="align-right">{{$impuesto->nombre}} ({{$impuesto->cantidad}}%)</th>
                @if(strpos(strtoupper($impuesto->nombre), 'IVA')!== false)
                    @php
                        $iva = $impuesto->cantidad;
                        $calc = $factura->precio_total + (($iva/100) * $factura->precio_total);
                    @endphp
                    <td class="align-right"> {{round($calc, 2)}}€</td>
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
                    <td class="align-right"> {{round($irpfcalc, 2)}}€</td>
                @endif
            </tr>
            <tr>
                @if(strpos(strtoupper($impuesto->nombre), 'IRPF') === false and strpos(strtoupper($impuesto->nombre), 'IVA') === false)
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
                    <td class="align-right"> {{round($icalc, 2)}}€</td>
                @endif
            </tr>

        @empty
        @endforelse

        <!-- TOTAL -->
    </table>
    <table>
        <tr class="azul-oscuro">
            <td></td>
            <td class="align-right"><b>{{$factura->precio_final}}€</b></td>
        </tr>

    </table>

    <!-- DATOS DE PAGO -->

    <br>
    <hr>

    <table>

        <tr>

        </tr>

    </table>

        <span>FORMA DE PAGO</span><br><br>
        <span>Por transferencia bancaria a: BANC SABADELL (IBAN): <b> {{$empresa->iban}}</b></span>

        <p class="pequena"> De acuerdo con la normativa RGPD UE 2016 / 679, de Protección de Datos de
            Carácter Personal, le informo que los datos de este documento están
            incluidos en un tratamiento del que es responsable DANIEL GONZÁLEZ DONAIRE y con el interés
            legítimo de la ejecución de un contrato con la finalidad
            de realizar la gestión fiscal, contable y administrativa de los servicios solicitados, así
            como el envío de información y comunicaciones sobre los servicios
            contratados y/o suministrados. Le informo también sobre sus derechos de acceso,
            rectificación, cancelación y oposición que se podrá ejercer en el email:
            info@iceond.com </p>

</body>

</html>
