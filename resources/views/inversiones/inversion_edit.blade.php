@extends('layouts.layout')
@section('content')
<!-- Saving state -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('inversiones.index') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a>  <span class="font-weight-semibold">Editar inversion: {{$inversion->nombre}}</span></h4>
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

    <!-- <form action="{{ route('inversiones.update',['id'=> $inversion->id])}}"  method="POST" class="wizard-form steps-state-saving-contacto" id="formInversiones"  data-fouc>
        {{ method_field('PUT')}}
        {!! csrf_field() !!} -->

        <form method="POST" enctype="multipart/form-data" action=" {{ route('inversiones.update', $inversion ) }}"  class="wizard-form steps-state-saving-inversions" id="formInversions"  data-fouc>
        @csrf
        {{ method_field('PUT') }}
        <h6>Inversion</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-3 offset-1">
                    <h6><b>Información inversion</b></h6>  
                </div>
                <div class="col-md-7 d-flex justify-content-start flex-column">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Producto: *</label>                        
                        
                            <select class="form-control select" data-fouc name="producto">
                                <optgroup label="Producto">
                                    @foreach($productos as $pro)


                                        <option value="{{$pro->id}}" 
                                            {{ $producto->id == $pro->id ? 'selected' : ''}}>
                                            {{ $pro->nombre }}
                                        </option>



                                    @endforeach
                                </optgroup>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Precio: *</label>
                            <input type="text" name="precio" class="form-control rounded-round" placeholder="Escribe el precio aquí..." value="{{$inversion->precio}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cantidad: *</label>
                            <input type="text" name="cantidad" class="form-control rounded-round" placeholder="Escribe la cantidad aquí..." value="{{$inversion->cantidad}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Proveedor: *</label>
                            <select class="form-control select" data-fouc name="proveedor">
                                <optgroup label="Contactos">
                                    @foreach($proveedores as $pro)

                                        <option value="{{$pro->id}}" 
                                            {{ $proveedor->id == $pro->id ? 'selected' : ''}}>
                                            {{ $pro->persona_contacto }}
                                        </option>

                                    @endforeach
                                </optgroup>
                            </select>
                        </div>  
                    </div>
                </div>
            </div>
            <br>
           
        </fieldset>

        
    </form>
</div>
<!-- /saving state -->

@endsection