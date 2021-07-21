@extends('layouts.layout')
@section('content')
<!-- Saving state -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('configuracion.index') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a>  <span class="font-weight-semibold">Nueva Configuración</span></h4>
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

    <form  method="POST" class="wizard-form steps-state-saving-contacto" id="formContacto" action="{{route('configuracion.store')}}" data-fouc>
        {!! csrf_field() !!}
        <h6>Configuración</h6>
        <fieldset>
            <div class="row">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Titulo: *</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Escribe el titulo aquí..." value="{{ old('titulo') }}">
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Configuración: *</label>
                        <textarea name="configuracion" rows="4" cols="4" placeholder="Descripción..." class="form-control">{{ old('configuracion') }}</textarea>
                    </div>
                </div>
            </div>
            <br>
        </fieldset>
    </form>
</div>
<!-- /saving state -->

@endsection