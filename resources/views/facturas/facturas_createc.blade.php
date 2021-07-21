@extends('layouts.layout')
@section('content')
<!-- Saving state -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('facturas.index') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a>  <span class="font-weight-semibold">Nueva Factura</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<div class="card">
    @if($errors->any())
        <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form  method="POST" class="wizard-form steps-state-saving-facturac" id="formFacturac" action="{{route('facturas.storec')}}" >
        {!! csrf_field() !!}
        <h6>Factura - c</h6>
        <fieldset>


            <div class=" row ">
                <div class="col-md-3 offset-1">
                    <h6><b>Configuración</b></h6>
                </div>
                <div class="col-md-7 d-flex justify-content-start flex-column">
                    <div class="form-group col-md-6">
                        <label>Contactos: *</label>

                        <input name="contacto" class="form-control" list="contactosOptions" id="contactosInput" placeholder="Buscar cliente..." oninput="buscadorContactos()">
                        <datalist id="contactosOptions" name="contacto">

                            @foreach($contactos as $contacto)
                                <option data-value="{{ $contacto->persona_contacto }}">{{ $contacto->persona_contacto }}</option>
                            @endforeach

                        </datalist>

                    </div>

                    <div class="col-md-6">
                        <label>Fecha caducidad: </label>
                        <div class="form-group">
                            <input class="form-control rounded-round" type="date" name="fecha" value="{{old('fecha')}}">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row caja-de-errores alert alert-danger" hidden></div>
            <div class="row ">
                <!-- <div class="col-md-3 offset-1">
                    <h6><b>titulo</b></h6>
                </div> -->
                <div class="col-md-4 d-flex justify-content-start flex-column">
                    <div class="form-group col-md-11">
                        <label>Añadir productos y servicios: *</label>
                        
                        <!-- <select class="form-control select " data-fouc id="selectPresupuesto" >
                            <option value="null">null</option>
                            <optgroup id="servicios" label="Servicios">
                                @foreach($servicios as $servicio)
                                    <option class="servicios" value="{{$servicio->id}}">{{ $servicio->titulo_servicio }}</option>
                                @endforeach
                            </optgroup>
                            <optgroup id="productos" label="Productos">
                                @foreach($productos as $producto)
                                    <option class="productos" value="{{$producto->id}}">{{ $producto->nombre }}</option>
                                @endforeach
                            </optgroup>
                        </select> -->

                        <input name="productos" class="form-control" list="productosOptions" id="productosInput" onchange="setValueProduct()" onkeypress="buscadorProductos()" placeholder="Buscar producto..." >
                        <datalist id="productosOptions" name="producto">

                            {{-- LISTAMOS PRODUCTOS --}}
                            <?php $count = 0; ?>
                            @foreach($productos as $producto)
                                <?php if($count == 2) break; ?>
                                <option class="producto"  data-value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                <?php $count++; ?>
                            @endforeach

                            {{-- LISTAMOS SERVICIOS --}}
                            <?php $count = 0; ?>
                            @foreach($servicios as $servicio)
                                <?php if($count == 2) break; ?>
                                <option class="servicio"  data-value="{{ $servicio->id }}">{{ $servicio->titulo_servicio }}</option>
                                <?php $count++; ?>

                            @endforeach

                        </datalist>

                        <input type="hidden" id="typeOption" >
                        <input type="hidden" id="idValue" >

                    </div>
                    <div class="col-md-11">
                        <div class="form-group">
                            <label>Precio: *</label>
                            <input type="text" id="precioPresupuesto"  class="form-control rounded-round" placeholder="0.00€..." >
                        </div>
                    </div>
                    <div class="col-md-11">
                        <div class="form-group">
                            <label >Cantidad: *</label>
                            <input type="text" id="cantidadPresupuesto"  class="form-control rounded-round" placeholder="10..." >
                        </div>
                    </div>
                    <div class="col-md-11 ">
                        <div class="form-group">
                            <label>Descripción:</label>
                            <textarea id="observacionesPresupuesto"  rows="5" cols="7" placeholder="Descripción..." class="form-control "></textarea>
                        </div>
                    </div>
                    <div class="col-md-11 ">
                        <div class="form-group ">
                            <button type="button" id="anadirPresupuesto" class="btn btn-primary col-md-12">Añadir</button>
                        </div>
                    </div>

                </div>

                <div class="col-md-8">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-xs">
                                <thead>
                                    <tr>
                                        <th>Productos/Servicios</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody class="table_body ">

                                </tbody>
                            </table>
                        </div>
                        <!--  -->
                    </div>
                </div>



            </div>
            <hr>
            <div class=" row ">
                <div class="col-md-3 offset-1">
                    <h6><b>Impuestos</b></h6>
                </div>
                <div class="col-md-7 d-flex justify-content-start flex-column">
                    <div class="col-md-6 p-0">
                        <div class="form-group">
                            <label>Descuento: </label>
                            <input type="text" id="descuentoPresupuesto" name="descuentoPresupuesto" class="form-control rounded-round" placeholder="10%..." value="{{old('descuentoPresupuesto')}}">
                        </div>
                    </div>
                    <div class="form-group col-md-12 row">

                        @forelse($impuestos as $impuesto)
                            <div class="col-md-4 offse-1 row">
                                    <input name="impuestos[]" type="checkbox" class="form-check-input-styled impuestoCheckbox rounded-round"  data-fouc  value="{{$impuesto->id}}" checked>
                            &nbsp;{{$impuesto->nombre}}&nbsp;({{$impuesto->cantidad}}%)

                            </div>
                        @empty
                        <div class="alert alert-danger">
                            <h1>No hay impuestos asignados</h1>
                        </div>
                        @endforelse

                    </div>
                    <div class="row">
                    <div class="col-md-3">
                            <div class="form-group">
                                <label>Precio Total: </label>
                                <input type="text" id="precioTotal" name="precioTotal"  class="form-control rounded-round col-md-11" placeholder="0.00€..." value="0" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Precio Total con Descuento: </label>
                                <input type="text" id="precioConDescuento" name="precioConDescuento"  class="form-control rounded-round col-md-10" placeholder="0.00€..." value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Precio Total con Impuestos: </label>
                                <input type="text" id="precioImp" name="precioConDescuento"  class="form-control rounded-round col-md-8" placeholder="0.00€..." value="" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </fieldset>

    </form>
</div>
<!-- /saving state
-->

@endsection
