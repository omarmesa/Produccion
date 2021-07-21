@extends('layouts.layout')
@section('content')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('usuarios.index') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a>  <span class="font-weight-semibold">Editar Usuario: {{$usuario->name}}</span></h4>
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

    <form  method="POST" class="wizard-form steps-state-saving-servicio" id="formServicio" action="{{route('usuarios.update',['id'=> $usuario->id])}}" data-fouc>
        {{ method_field('PUT')}}
        {!! csrf_field() !!}
        <h6>Usuario</h6>
        <fieldset>
            <div class="row">
            <div class="col-md-3 offset-1">
                    <h6><b>Información Usuario</b></h6>  
                </div>
                <div class="col-md-7 d-flex justify-content-start flex-column">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre: *</label>
                            <input type="text" name="name" class="form-control rounded-round" placeholder="Escribe el nombre aquí..."  value="{{$usuario->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email: *</label>
                            <input type="email" name="email" class="form-control rounded-round" placeholder="Ejemplo@email.com" value="{{$usuario->email}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password: *</label>
                            <input type="password" name="password" class="form-control rounded-round" placeholder="12345678...">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Repite la Password: *</label>
                            <input type="password" name="password2" class="form-control rounded-round" placeholder="12345678...">
                        </div>
                    </div>
                </div>
            </div>
            
        </fieldset>
    </form>
</div>

@endsection