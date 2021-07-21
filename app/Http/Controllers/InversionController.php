<?php

namespace App\Http\Controllers;

use App\Inversion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contacto;
use App\Productos;

class InversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inversiones=Inversion::all();
        $inversiones = $inversiones->sortByDesc('created_at');
        $productos=Productos::all();


        return view('inversiones/inversion', compact('inversiones', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $contactos=Contacto::where('proveedor', 1)->get();
        $productos=Productos::all();

        return view('inversiones/inversion_create', compact(['contactos', 'productos']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'producto' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'proveedor' => 'required',
        ]);
        $producto=Inversion::create([
            'producto' => $data['producto'],
            'precio' => $data['precio'],
            'cantidad' => $data['cantidad'],
            'proveedor' => $data['proveedor'],
        ]);
        return redirect()->route('inversiones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inversion  $inversion
     * @return \Illuminate\Http\Response
     */
    public function info($id)
    {
        $inversiones= Inversion::find($id);
        $proveedor = Contacto::find($inversiones->proveedor);
        $producto = Productos::find($inversiones->producto);

        // dd($proveedor);
        return view('inversiones/inversion_info', compact('inversiones', 'proveedor', 'producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inversion  $inversion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inversion= Inversion::find($id);
        $proveedor = Contacto::find($inversion->proveedor);
        $proveedores = Contacto::where('proveedor', 1)->get();

        $producto = Productos::find($inversion->producto);
        $productos = Productos::all();

        return view('inversiones/inversion_edit', compact('inversion', 'proveedor', 'proveedores', 'producto', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inversion  $inversion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inversion= Inversion::find($id);
        $data=request()->validate([
            'producto' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'proveedor' => 'required',
        ]);
        
        $inversion->update([
            'producto' => $data['producto'],
            'precio' => $data['precio'],
            'cantidad' => $data['cantidad'],
            'proveedor' => $data['proveedor'],
        ]);
        return redirect()->route('inversiones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inversion  $inversion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inversion=Inversion::find($id);
        $inversion->delete();
        return redirect()->route('inversiones.index');
    }

    public function search(){
        $data= request()->validate([
            'search' => 'nullable',
        ]);
        $query=$data['search'];
        $inversiones = DB::select("SELECT * FROM `inversions` WHERE `producto` LIKE '%$query%' ORDER BY `producto` ASC");
        return view('inversiones/inversion', compact('inversiones'));
    }


    public function getProductosComponent()
    {
        if($rol == TiposRoles::TODOS)
        {
            return $this->findAll()->paginate($num);
        }
        
        return User::findByRol($rol)->get();
        return view('citas.components.partials.cliente', ['clientes' => $this->userRepository->listadoPaginado(TiposRoles::CLIENTE, 1)]);
    }


}
