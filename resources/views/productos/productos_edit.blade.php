@extends('layouts.layout')
@section('content')
<!-- Saving state -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ route('productos.index') }}" class="icon-circle-left2 text-teal-400 mr-2" style="font-size: 25px;"></a>  <span class="font-weight-semibold">Editar Producto: {{$producto->nombre}}</span></h4>
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

    <form  method="POST" class="wizard-form steps-state-saving-producto" id="formProducto" action="{{ route('productos.update',['id'=> $producto->id])}}" data-fouc>
        {{ method_field('PUT')}}
        {!! csrf_field() !!}
        <h6>Producto</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-3 offset-1">
                    <h6><b>Información Producto</b></h6>  
                </div>
                <div class="col-md-7 d-flex justify-content-start flex-column">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre: *</label>
                            <input type="text" name="nombre" class="form-control rounded-round" placeholder="Escribe el nombre aquí..." value="{{$producto->nombre}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SKU: *</label>
                            <input type="text" name="sku" class="form-control rounded-round" placeholder="Escribe el SKU aquí..." value="{{$producto->sku}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Precio: *</label>
                            <input type="email" name="precio" class="form-control rounded-round" placeholder="Escribe el precio aquí..." value="{{$producto->precio}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stock: *</label>
                            <input type="text" name="stock" class="form-control rounded-round" placeholder="Escribe el numero de stock aquí..." value="{{$producto->stock}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descripción: *</label>
                            <textarea name="descripcion" rows="4" cols="4" placeholder="Descripción..." class="form-control" >{{$producto->descripcion}}</textarea>
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