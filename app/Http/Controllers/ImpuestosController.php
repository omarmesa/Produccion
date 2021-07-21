<?php

namespace App\Http\Controllers;

use App\Impuestos;
use App\Productos;
use App\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImpuestosController extends Controller
{
    //
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $impuestos=Impuestos::all();
        $impuestos = $impuestos->sortByDesc('created_at');
        return view('impuestos/impuestos', compact('impuestos'));
    }
    public function create()
    {
        return view('impuestos/impuestos_create');
    }
    public function store()
    {
        $data=request()->validate([
            'nombre' => 'required',
            'cantidad' => 'required|integer',
        ]);
        $impuesto = Impuestos::create([
            'nombre' => $data['nombre'],
            'cantidad' => $data['cantidad'],
        ]);
        return redirect()->route('impuestos.index');
    }
    public function info($id){
        $impuesto = Impuestos::find($id);
        return view('impuestos/impuestos_info', compact('impuesto'));
    }
    public function edit($id){
        $impuesto = Impuestos::find($id);
        return view('impuestos/impuestos_edit', compact('impuesto'));
    }
    public function update($id){
        
        $impuesto = Impuestos::find($id);
     
        $data=request()->validate([
            'nombre' => 'required',
            'cantidad' => 'required|integer',
        ]);
        
        $impuesto->update([
            'nombre' => $data['nombre'],
            'cantidad' => $data['cantidad'],
        ]);
        return redirect()->route('impuestos.index');

    }
    public function destroy($id){
        $impuesto = Impuestos::find($id);
        $impuesto->delete();
        return redirect()->route('impuestos.index');
    }
    public function search(){
        $data = request()->validate([
            'search' => 'nullable',
        ]);
        $query = $data['search'];
        $impuestos = DB::select("SELECT * FROM `impuestos` WHERE `nombre` LIKE '%$query%' ORDER BY `nombre` ASC");
        return view('impuestos/impuestos', compact('impuestos'));
    }
}
