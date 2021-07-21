@extends('layouts.layout')
@section('content')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('contactos.index') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a>  <span class="font-weight-semibold">{{$contacto->persona_contacto}}</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div> 
    </div>
</div>
<!-- /page header -->


<!-- Dropdown list -->
<div class="row col-md-12 p-0 m-0">
    <div class="col-md-6 col-xs-12 pl-0 pr-0">
        <div class="card ">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Información Personal:</h5>
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
                            <i class="icon-user text-teal-400" style="font-size: 40px;" ></i>
                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">Nombre:</div>
                            <span class="text-muted">{{$contacto->persona_contacto}}</span>
                        </div>
                    </li>
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-store  text-teal-400" style="font-size: 40px;"></i>                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">Empresa:</div>
                            <span class="text-muted">{{$contacto->empresa}}</span>
                        </div>
                    </li>
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-envelop  text-teal-400" style="font-size: 40px;"></i>                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">Email:</div>
                            <span class="text-muted">{{$contacto->email}}</span>
                        </div>
                    </li>
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-credit-card2  text-teal-400" style="font-size: 40px;"></i>                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">NIF:</div>
                            <span class="text-muted">{{$contacto->nif}}</span>
                        </div>
                    </li>
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-phone  text-teal-400" style="font-size: 40px;"></i>                            </a>
                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">Tel:</div>
                            <span class="text-muted">{{$contacto->telefono}}</span>
                        </div>
                    </li>
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-cursor2  text-teal-400" style="font-size: 40px;"></i>                            </a>
                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">Web:</div>
                            <span class="text-muted">{{$contacto->web}}</span>
                        </div>
                    </li>
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-comment  text-teal-400" style="font-size: 40px;"></i>                            </a>
                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">Observaciones:</div>
                            <span class="text-muted">{{$contacto->observaciones}}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12 pl-0 pr-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Dirección:</h5>
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
                                <i class="icon-city  text-teal-400" style="font-size: 40px;"></i>                            </a>
                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">Calle:</div>
                            <span class="text-muted">{{$direccion->calle}}</span>
                        </div>
                    </li>
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-home2  text-teal-400" style="font-size: 40px;"></i>                            </a>
                            </a>
                        </div>
                        <div class="media-body row">
                            <div class="ml-2"><div class="media-title font-weight-semibold">Numero:</div>
                            <span class="text-muted">{{$direccion->numero}}</span></div>
                            <div class="ml-2"><div class="media-title font-weight-semibold">Piso:</div>
                            <span class="text-muted">{{$direccion->piso}}</span></div>
                            <div class="ml-2"><div class="media-title font-weight-semibold">Puerta:</div>
                            <span class="text-muted">{{$direccion->puerta}}</span></div>
                            
                            
                        </div>
                        
                        
                        
                    </li>
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-mailbox  text-teal-400" style="font-size: 40px;"></i>                            </a>
                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">CP:</div>
                            <span class="text-muted">{{$direccion->cp}}</span>
                        </div>
                    </li>
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-location3  text-teal-400" style="font-size: 40px;"></i>                            </a>
                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">Provincia:</div>
                            <span class="text-muted">{{$direccion->provincia}}</span>
                        </div>
                    </li>
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-city  text-teal-400" style="font-size: 40px;"></i>                            </a>
                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">Poblacion:</div>
                            <span class="text-muted">{{$direccion->poblacion}}</span>
                        </div>
                    </li>
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <i class="icon-earth  text-teal-400" style="font-size: 40px;"></i>                            </a>
                            </a>
                        </div>
                        <div class="media-body">
                        <div class="media-title font-weight-semibold">Pais:</div>
                            <span class="text-muted">{{$direccion->pais}}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection