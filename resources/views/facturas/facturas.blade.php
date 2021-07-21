@extends('layouts.layout')
@section('content')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('home') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a> <span class="font-weight-semibold">Facturas</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div> 
        <form action="{{ route('facturas.search') }}" class="mt-3" method="GET">
           
           <div class="form-group form-group-feedback form-group-feedback-right">
               <input type="search" class="form-control rounded-round" name="search" placeholder="Search">
               <div class="form-control-feedback">
                   <i class="icon-search4 font-size-sm text-muted"></i>
               </div>
           </div>
       </form>
    </div>
</div>
<!-- /page header -->


<!-- Dropdown list -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Listado De Facturas</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item icon-plus-circle2" href="{{route('facturas.create')}}"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="collapse"></a>
                <!--<a class="list-icons-item" data-action="remove"></a>-->
            </div>
        </div>
    </div>

    <div class="card-body">
        <ul class="media-list">
            
            @forelse($facturas as $factura)
            <li class="media">
                <div class="mr-3  " >
                    <i class="icon-file-check text-teal-400" style="font-size: 30px;"  ></i>
                </div>

                <div class="media-body">
                    <div class="media-title font-weight-semibold">{{$factura->numero_de_factura}}</div>
                        @foreach($contactos as $contacto)
                            @if($contacto->id == $factura->contacto_id)
                                <span class="text-muted">{{$contacto->persona_contacto}}</span>
                            @endif
                        @endforeach
                </div>

                <div class="align-self-center ml-3">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu9"></i></a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('pdf.downloadFactura',['id'=> $factura->id]) }}"   class="dropdown-item"  data-target="#chat"><i class="icon-file-pdf"></i>Exportar a PDF</a>
                                <a href="{{ route('facturas.info',['id'=> $factura->id]) }}"   class="dropdown-item"  data-target="#chat"><i class="icon-magazine"></i>Ver información</a>
                                
                                <form action="{{route('facturas.delete',['id'=> $factura->id])}}" method="POST">
                                    {!! csrf_field() !!}
                                    {{ method_field('DELETE')}}
                                    <button type="submit" onclick="return confirm('¿Estas seguro?')"  class="dropdown-item"  data-target="#chat"><i class="icon-eraser"></i>Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @empty
            <h1 class="alert alert-danger">No hay facturas</h1>
            @endforelse
        </ul>
    </div>
</div>
<!-- /dropdown list -->



@endsection