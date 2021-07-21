@extends('layouts.layout')
@section('content')
<!-- Saving state -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('impuestos.index') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a>  <span class="font-weight-semibold">Editar Impuesto: {{$impuesto->nombre}}</span></h4>
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

    <form  method="POST" class="wizard-form steps-state-saving-producto" id="formProducto" action="{{ route('impuestos.update',['id'=> $impuesto->id])}}" data-fouc>
        {{ method_field('PUT')}}
        {!! csrf_field() !!}
        <h6>Impuesto</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-3 offset-1">
                    <h6><b>Información Impuesto</b></h6>  
                </div>
                <div class="col-md-7 d-flex justify-content-start flex-column">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre: *</label>
                            <input type="text" name="nombre" class="form-control rounded-round" placeholder="Escribe el nombre aquí..." value="{{$impuesto->nombre}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cantidad %: *</label>
                            <input type="text" name="cantidad" class="form-control rounded-round" placeholder="Escribe la cantidad aquí..." value="{{$impuesto->cantidad}}">
                        </div>
                    </div>
                </div>
                
            </div>

           
        </fieldset>

        
    </form>
</div>
<!-- /saving state -->

@endsection