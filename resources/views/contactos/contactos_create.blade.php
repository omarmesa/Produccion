@extends('layouts.layout')
@section('content')
<!-- Saving state -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('contactos.index') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a>  <span class="font-weight-semibold">Nuevo Contacto</span></h4>
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
    <form  method="POST" class="wizard-form steps-state-saving-contacto" id="formContacto" action="{{url('/contactos/create')}}"  data-fouc>
        {!! csrf_field() !!}
        <h6>Contacto</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-3 offset-1">
                    <h6><b>Información Contacto</b></h6>  
                </div>
                <div class="col-md-7 d-flex justify-content-start flex-column">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre: *</label>
                            <input type="text" name="persona_contacto" class="form-control rounded-round" placeholder="Escribe el nombre aquí..." value="{{ old('persona_contacto') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Empresa:</label>
                            <input type="text" name="empresa" class="form-control rounded-round" placeholder="Escribe el nombre de la empresa aquí..." value="{{ old('empresa') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email: *</label>
                            <input type="email" name="email" class="form-control rounded-round" placeholder="Ejemplo@email.com" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tel: *</label>
                            <input type="text" name="telefono" class="form-control rounded-round" placeholder="+34-99-9999-999" data-mask="+34-99-9999-999" value="{{ old('telefono') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Web:</label>
                            <input type="text" name="web" class="form-control rounded-round" placeholder="www.ejemplo.com" value="{{ old('web') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nif: *</label>
                            <input type="text" name="nif" class="form-control rounded-round" placeholder="Escribe el Nif aquí..." value="{{ old('nif') }}">
                        </div>
                    </div><br>
                    
                    <div class="col-md-6">
                        <div class="form-check form-check-inline form-check-right">
                            <label class="form-check-label">
                                Cliente 
                                <input name="cliente" type="checkbox" class="form-check-input-styled " checked data-fouc value="1" value="{{ old('cliente') }}">
                            </label>
                        </div>
                    </div><br>
                    <div class="col-md-6">
                        <div class="form-check form-check-inline form-check-right">
                            <label class="form-check-label">
                                Provedor
                                <input name="proveedor" type="checkbox" class="form-check-input-styled "  data-fouc  value="1" value="{{ old('proveedor') }}">
                            </label>
                        </div>
                    </div><br><br>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Observaciones:</label>
                            <textarea name="observaciones" rows="4" cols="4" placeholder="Observaciones..." class="form-control">{{ old('observaciones') }}</textarea>
                        </div>   
                    </div>

                </div>
            </div>
        </fieldset>

        <h6>Dirección</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-3 offset-1">
                    <h6><b>Información Dirección</b></h6>  
                </div>
                <div class="col-md-7 d-flex justify-content-start flex-column">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Calle: *</label>
                            <input type="text" name="calle" placeholder="Escribe la calle aquí..." class="form-control rounded-round" value="{{ old('calle') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Numero: *</label>
                            <input type="text" name="numero" placeholder="Escribe el numero aquí..." class="form-control rounded-round" value="{{ old('numero') }}">
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-md-3">
                                <div class="form-group">
                                    <label>Piso:</label>
                                    <input type="text" name="piso" placeholder="Piso..." class="form-control rounded-round" value="{{ old('piso') }}">
                                </div>
                            </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Puerta:</label>
                                <input type="text" name="puerta" placeholder="Puerta..." class="form-control rounded-round" value="{{ old('puerta') }}">
                            </div>
                        </div>  
                    </div>
                    
                    
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>País: *</label>
                                    <input type="text" name="pais" placeholder="Escribe el país aquí..." class="form-control rounded-round" value="{{ old('pais') }}">
                                </div>
                            </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Província: *</label>
                                <input type="text" name="provincia" placeholder="Escribe la província aquí..." class="form-control rounded-round" value="{{ old('provincia') }}">
                            </div>
                        </div>
                        
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Población: *</label>
                            <input type="text" name="poblacion" placeholder="Escribe la población aquí..." class="form-control rounded-round" value="{{ old('poblacion') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Código Postal: *</label>
                            <input type="text" name="cp" placeholder="Escribe el código postal aquí..." class="form-control rounded-round" value="{{ old('cp') }}">
                        </div>
                    </div>
                                
                </div>
            </div>

            

            
        </fieldset>

        
        
    </form>
    
</div>
<!-- /saving state -->

@endsection