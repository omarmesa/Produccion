@extends('layouts.layout')
@section('content')
<!-- Saving state -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('inversiones.index') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a>  <span class="font-weight-semibold">Nuevo inversion</span></h4>
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

    <form  method="POST" class="wizard-form steps-state-saving-contacto" id="formContacto" action="{{route('inversiones.store')}}" data-fouc>
        {!! csrf_field() !!}
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
                                    @foreach($productos as $producto)
                                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="col-12" id="pacientes-component-container">
                        Cargando pacientes...
                    </div> -->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Precio: *</label>
                            <input type="text" name="precio" class="form-control rounded-round" placeholder="Escribe el precio aquí..." value="{{ old('precio') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cantidad: *</label>
                            <input type="text" name="cantidad" class="form-control rounded-round" placeholder="Escribe el numero de cantidad aquí..." value="{{ old('cantidad') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Proveedor: *</label>
                            <select class="form-control select" data-fouc name="proveedor">
                                <!-- <option value="null">null</option> -->
                                <optgroup label="Contactos">
                                    @foreach($contactos as $contacto)
                                        <option value="{{$contacto->id}}">{{ $contacto->persona_contacto }}</option>
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