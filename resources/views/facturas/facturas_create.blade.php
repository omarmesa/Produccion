@extends('layouts.layout')
@section('content')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('facturas.index') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a> <span class="font-weight-semibold">Generar Factura</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div> 
    </div>
</div>
<!-- /page header -->
<!-- Dropdown list -->
<div class="card">
    <div class="row col-md-12 mt-4 mb-4">
        <div class="col-md-3 offset-1">
            <h6><b>Selecciona</b></h6>  
        </div>
        <div class="col-md-7 d-flex justify-content-start flex-column">
            <div class="col-md-6 d-flex justify-content-center mt-2">
                <a class="btn btn-primary col-md-12" href="{{ route('facturas.create.presupuesto') }}">Generar a partir de presupuesto</a>
            </div>
            <div class="col-md-6 d-flex justify-content-center mt-2">
                <a class="btn btn-primary col-md-12" href="{{ route('facturas.create.cero') }}">Generar desde cero</a>
            </div>  
        </div>
        
    </div>
</div>
<!-- /dropdown list -->
@endsection