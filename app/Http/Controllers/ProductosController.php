<?php

namespace App\Http\Controllers;

use App\Productos;
use App\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
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
        $productos=Productos::all();
        $productos = $productos->sortByDesc('created_at');
        return view('productos/productos', compact('productos'));
    }
    public function create()
    {
        return view('productos/productos_create');
    }
    public function store()
    {
        $data=request()->validate([
            'nombre' => 'required',
            'sku' => 'required|integer',
            'precio' => 'required',
            'stock' => 'required|integer',
            'descripcion' => 'required',
        ]);
        $producto=Productos::create([
            'nombre' => $data['nombre'],
            'sku' => $data['sku'],
            'precio' => $data['precio'],
            'stock' => $data['stock'],
            'descripcion' => $data['descripcion'],
        ]);
        return redirect()->route('productos.index');
    }
    public function info($id){
        $producto= Productos::find($id);
        return view('productos/productos_info', compact('producto'));
    }
    public function edit($id){
        $producto= Productos::find($id);
        return view('productos/productos_edit', compact('producto'));
    }
    public function update($id){
        
        $producto= Productos::find($id);
     
        $data=request()->validate([
            'nombre' => 'required',
            'sku' => 'required|integer',
            'precio' => 'required',
            'stock' => 'required|integer',
            'descripcion' => 'required',
        ]);
        
        $producto->update([
            'nombre' => $data['nombre'],
            'sku' => $data['sku'],
            'precio' => $data['precio'],
            'stock' => $data['stock'],
            'descripcion' => $data['descripcion'],
        ]);
        return redirect()->route('productos.index');

    }
    public function destroy($id){
        $producto=Productos::find($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }
    public function search(){
        $data= request()->validate([
            'search' => 'nullable',
        ]);
        $query=$data['search'];
        $productos = DB::select("SELECT * FROM `productos` WHERE `nombre` LIKE '%$query%' ORDER BY `nombre` ASC");
        return view('productos/productos', compact('productos'));
    }
}
