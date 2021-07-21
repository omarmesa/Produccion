@extends('layouts.layout')
@section('content')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('configuracion.index') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a>  <span class="font-weight-semibold">{{$configuracion->titulo}}</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div> 
    </div>
</div>
<!-- /page header -->


<!-- Dropdown list -->
<div class="row">
    <div class="col-md-12 col-xs-12 pl-0 pr-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Información De La Configuración:</h5>
                <div class="header-elements">
                    <div class="list-icons">
                    
                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="media-list">
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-price-tags  text-teal-400" style="font-size: 35px;"></i>
                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">Titulo:</div>
                            <span class="text-muted">{{$configuracion->titulo}}</span>
                        </div>
                    </li>
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-barcode2  text-teal-400" style="font-size: 40px;"></i>
                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">Configuración:</div>
                            <span class="text-muted">{{$configuracion->configuracion}}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
</div>


@endsection