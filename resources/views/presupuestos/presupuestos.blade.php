@extends('layouts.layout')
@section('content')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('home') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a> <span class="font-weight-semibold">Presupuestos</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div> 
        <form action="{{ route('presupuestos.search') }}" class="mt-3" method="GET">
           
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
        <h5 class="card-title">Listado De Presupuestos</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item icon-plus-circle2" href="{{route('presupuestos.create')}}"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="collapse"></a>
                <!--<a class="list-icons-item" data-action="remove"></a>-->
            </div>
        </div>
    </div>

    <div class="card-body">
        <ul class="media-list">
            
            @forelse($presupuestos as $presupuesto)
            <li class="media">
                <div class="mr-3  " >
                    <i class="icon-clipboard3 text-teal-400" style="font-size: 30px;"  ></i>
                </div>

                <div class="media-body">
                    <div class="media-title font-weight-semibold">{{$presupuesto->numero_de_presupuesto}}</div>
                        @foreach($contactos as $contacto)
                            @if($contacto->id == $presupuesto->contacto_id)
                                <span class="text-muted">{{$contacto->persona_contacto}}</span>
                            @endif
                        @endforeach
                </div>

                <div class="align-self-center ml-3">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu9"></i></a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('pdf.downloadPresupuesto',['id'=> $presupuesto->id]) }}"   class="dropdown-item"  data-target="#chat"><i class="icon-file-pdf"></i>Exportar a PDF</a>
                                <a href="{{ route('presupuestos.info',['id'=> $presupuesto->id]) }}"   class="dropdown-item"  data-target="#chat"><i class="icon-magazine"></i>Ver informaci??n</a>
                                <!--<a href="{{ route('presupuestos.edit',['id'=> $presupuesto->id])}}" class="dropdown-item"  data-target="#chat"><i class="icon-pencil3"></i> Editar</a>-->
                                <form action="{{route('presupuestos.delete',['id'=> $presupuesto->id])}}" method="POST">
                                    {!! csrf_field() !!}
                                    {{ method_field('DELETE')}}
                                    <button type="submit" onclick="return confirm('??Estas seguro?')"  class="dropdown-item"  data-target="#chat"><i class="icon-eraser"></i>Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @empty
            <h1 class="alert alert-danger">No hay presupuestos</h1>
            @endforelse
        </ul>
    </div>
</div>
<!-- /dropdown list -->



@endsection