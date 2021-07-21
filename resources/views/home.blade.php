@extends('layouts.layout')
@section('content')
<!-- <div class="card col-md-12" >
    <div class="m-2 border-3 border-dark row" style="background-image: url('img/suro.jpg');">
        Calendar widget
            <div class="card col-md-4 ml-3 mr-3 mt-3 col-sm-12">
                <div class="form-control-datepicker border-0"></div>
            </div>
        /calendar widget
        <div class="col-md-4 ml-3 mr-3 mt-3 col-sm-12">
            <a class="weatherwidget-io" href="https://forecast7.com/es/41d221d73/vilanova-i-la-geltru/" data-label_1="VILANOVA I LA GELTRÚ" data-label_2="TIEMPO" data-theme="original" >VILANOVA I LA GELTRÚ WEATHER</a>
            <script>
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
            </script>
        </div>
        <img class="col-md-2 mt-3 ml-3 mr-3 col-sm-12 mb-3" height="150px" src="{{url('img/logo.png')}}">
    </div>
</div> -->
<div class="card col-md-12">
    <h1 class="m-2"><i class="icon-file-check text-teal-400" style="font-size: 30px;"></i>  &nbsp;<b>Facturas</b></h1>
    <div class="card-body row ">
        <div class="col-md-6">
            <div class="d-flex justify-content-center">
                <h1 class="text-teal-400" style="font-size: 100px;">{{$numFacturas}}</h1>
            </div>
            <div class="d-flex justify-content-center">
                <h4>Total Facturas Último Año</h4>   
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-center">
                <h1 class="text-teal-400" style="font-size: 100px;">{{$totalFacturado}}€</h1>
            </div>
            <div class="d-flex justify-content-center">
                <h4>Total Facturado Último Año</h4>
            </div>
        </div>
    </div>
</div>
@endsection