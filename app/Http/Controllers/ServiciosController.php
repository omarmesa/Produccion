<?php

namespace App\Http\Controllers;

use App\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiciosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $servicios=Servicios::all();
        $servicios = $servicios->sortByDesc('created_at');
        return view('servicios/servicios', compact('servicios'));
    }
    public function create()
    {
        return view('servicios/servicios_create');
    }
    public function store()
    {
        $data=request()->validate([
            'titulo_servicio' => 'required',
            'coste_servicio' => 'required',
            'descripcion' => 'required',
        ]);
        $servicio=Servicios::create([
            'titulo_servicio' => $data['titulo_servicio'],
            'coste_servicio' => $data['coste_servicio'],
            'descripcion' => $data['descripcion'],
        ]);
        return redirect()->route('servicios.index');
    }
    public function info($id){
        $servicio=Servicios::find($id);
        return view('servicios/servicios_info', compact('servicio'));
    }
    public function edit($id){
        $servicio= Servicios::find($id);
        return view('servicios/servicios_edit', compact('servicio'));
    }
    public function update($id){
        
        $servicio= Servicios::find($id);
     
        $data=request()->validate([
            'titulo_servicio' => 'required',
            'coste_servicio' => 'required',
            'descripcion' => 'required',
        ]);
        
        $servicio->update([
            'titulo_servicio' => $data['titulo_servicio'],
            'coste_servicio' => $data['coste_servicio'],
            'descripcion' => $data['descripcion'],
        ]);
        return redirect()->route('servicios.index');

    }
    public function destroy($id){
        $servicio=Servicios::find($id);
        $servicio->delete();
        return redirect()->route('servicios.index');
    }
    public function search(){
        $data= request()->validate([
            'search' => 'nullable',
        ]);
        $query=$data['search'];
        $servicios = DB::select("SELECT * FROM `servicios` WHERE `titulo_servicio` LIKE '%$query%' ORDER BY `titulo_servicio` ASC");
        return view('servicios/servicios', compact('servicios'));
    }
}