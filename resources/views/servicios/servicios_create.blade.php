@extends('layouts.layout')
@section('content')
<!-- Saving state -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('servicios.index') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a> Nuevo Servicio</h4>
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

    <form  method="POST" class="wizard-form steps-state-saving-servicio" id="formServicio" action="{{route('servicios.store')}}" data-fouc>
        {!! csrf_field() !!}
        <h6>Servicio</h6>
        <fieldset>

            <div class="row">
                <div class="col-md-3 offset-1">
                    <h6><b>Información Servicio</b></h6>  
                </div>
                <div class="col-md-7 d-flex justify-content-start flex-column">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre: *</label>
                            <input type="text" name="titulo_servicio" class="form-control rounded-round" placeholder="Escribe el nombre del servicio aquí..." value="{{ old('titulo_servicio') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Coste Del Servicio: *</label>
                            <input type="text" name="coste_servicio" class="form-control rounded-round" placeholder="Escribe el coste del servicio aquí..." value="{{ old('coste_servicio') }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descripción: *</label>
                            <textarea name="descripcion" rows="4" cols="4" placeholder="Descripción..." class="form-control">{{ old('descripcion') }}</textarea>
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