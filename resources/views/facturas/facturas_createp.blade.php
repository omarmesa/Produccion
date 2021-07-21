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

    <form  method="POST" class="wizard-form steps-state-saving-facturap" id="formFacturap" action="{{route('facturas.storep')}}" >
        {!! csrf_field() !!}
        <h6>Factura p</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-3 offset-1">
                    <h6><b>Presupuesto</b></h6>
                </div>
                <div class="col-md-7 d-flex justify-content-start flex-column">
                    <div class="form-group col-md-5">
                        <label>Añadir Presupuesto : *</label>
                        <select class="form-control select" data-fouc id="selectPresupuestoFactura" name="selectPresupuestoFactura" value="{{old('selectPresupuestoFactura')}}">
                            <option value="null">null</option>
                                @foreach($presupuestos as $presupuesto)
                                    <option class="presupuestos" value="{{$presupuesto->id}}">{{ $presupuesto->numero_de_presupuesto }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-md-5 ">
                        <div class="form-group">
                            <label>Precio total  : *</label>
                            <input type="text" id="precioTotal" name="precioFinal"  class="form-control rounded-round" placeholder="0.00€..." value="0" readonly>
                        </div>
                    </div>
                    <div class="col-md-5 ">
                        <div class="form-group">
                            <label>Precio final con impuestos aplicados  : *</label>
                            <input type="text" id="precioImp" name="precioImp"  class="form-control rounded-round" placeholder="0.00€..." value="0" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-12 p-0 row">
                <div class="col-md-3 offset-1">
                    <h6><b>Impuestos aplicables</b></h6>
                </div>
                <div class="col-md-7 d-flex justify-content-start flex-column">
                <br><br>
                    <div class="form-group col-md-12 ml-2 row">

                        @forelse($impuestos as $impuesto)
                            <div class="col-md-2 offse-1 row">
                                @if(strpos(strtoupper($impuesto->nombre), 'IRPF') !== false or strpos(strtoupper($impuesto->nombre), 'IVA') !== false)
                                    <input name="impuestos[]" type="checkbox" class="form-check-input-styled impuestoCheckbox"  data-fouc  value="{{$impuesto->id}}" checked>
                                @else
                                    <input name="impuestos[]" type="checkbox" class="form-check-input-styled impuestoCheckbox"  data-fouc  value="{{$impuesto->id}}" >
                                @endif
                                &nbsp;{{$impuesto->nombre}}&nbsp;({{$impuesto->cantidad}}%)

                            </div>
                        @empty
                        <div class="alert alert-danger">
                            <h1>No hay impuestos</h1>
                        </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </fieldset>
    </form>

</div>

@endsection
