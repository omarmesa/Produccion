<?php

namespace App\Http\Controllers;

use App\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfiguracionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $configuraciones=Configuracion::all();
        
        return view('configuracion_presupuestos/configuracion', compact(['configuraciones']));
        
    }
    public function create()
    {
        return view('configuracion_presupuestos/configuracion_create');
    }
    public function store()
    {
        $data=request()->validate([
            'titulo' => 'required',
            'configuracion' => 'required',
        ]);
        $configuracion=Configuracion::create([
            'titulo' => $data['titulo'],
            'configuracion' => $data['configuracion'],
        ]);
        return redirect()->route('configuracion.index');
    }
    public function info($id){

        $configuracion=Configuracion::find($id);
        return view('configuracion_presupuestos/configuracion_info', compact('configuracion'));
        
    }
    public function edit($id){

        $configuracion=Configuracion::find($id);
        return view('configuracion_presupuestos/configuracion_edit', compact('configuracion'));
       
    }
    public function update($id){
        
        $configuracion=Configuracion::find($id);

        $data=request()->validate([
            'titulo' => 'required',
            'configuracion' => 'required',
        ]);
        $configuracion->update([
            'titulo' => $data['titulo'],
            'configuracion' => $data['configuracion'],
        ]);
        return redirect()->route('configuracion.index');

    }
    public function destroy($id){

        $configuracion=Configuracion::find($id);
        $configuracion->delete();
        return redirect()->route('configuracion.index');
       
    }
    public function search(){

        $data= request()->validate([
            'search' => 'nullable',
        ]);
        $query=$data['search'];
        $configuraciones = DB::select("SELECT * FROM `configuracion_presupuestos` WHERE `titulo` LIKE '%$query%' ORDER BY `titulo` ASC");
        return view('configuracion_presupuestos/configuracion', compact('configuraciones'));
        
    }
}
