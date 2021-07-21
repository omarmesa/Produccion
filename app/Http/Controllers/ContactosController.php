<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Direcciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ContactosController extends Controller
{
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
        $contactos=Contacto::all();
        $contactos = $contactos->sortByDesc('created_at');

        return view('contactos/contactos', compact('contactos'));
    }
    public function create()
    {
        return view('contactos/contactos_create');
    }
    public function store()
    {
       $data = request()->validate([
        'persona_contacto' => 'required',
        'empresa' => 'nullable',
        'nif' => 'required|unique:contacto,nif',
        'telefono' => 'required',
        'email' => 'required|email|unique:contacto,email',
        'web' => 'nullable',
        'cliente' => 'nullable',
        'proveedor' => 'nullable',
        'observaciones' => 'nullable',
        'persona_contacto' => 'required',
        'calle' => 'required',
        'numero' => 'required',
        'piso' => 'nullable',
        'puerta' => 'nullable',
        'cp' => 'required',
        'provincia' => 'required',
        'poblacion' => 'required',
        'pais' => 'required',
       ]);
        if(!isset($data['cliente'])){
            $data['cliente']=0;
        }
        if(!isset($data['proveedor'])){
            $data['proveedor']=0;
        }
        $ultimoContacto=Contacto::create([
           'persona_contacto' => $data['persona_contacto'],
           'empresa' => $data['empresa'],
           'nif' => $data['nif'],
           'telefono' => $data['telefono'],
           'email' => $data['email'],
           'web' => $data['web'],
           'cliente' => $data['cliente'],
           'proveedor' => $data['proveedor'],
           'observaciones' => $data['observaciones'],
        ]);
        Direcciones::create([
            'calle' => $data['calle'],
            'numero' => $data['numero'],
            'piso' => $data['piso'],
            'puerta' => $data['puerta'],
            'cp' => $data['cp'],
            'provincia' => $data['provincia'],
            'poblacion' => $data['poblacion'],
            'pais' => $data['pais'],
            'id_cliente' => $ultimoContacto->id,
        ]);
        
        return redirect()->route('contactos.index');
    }
    public function edit($id){
        $contacto= Contacto::find($id);
        $id_cliente=$id;
        $direccion=Direcciones::find($id_cliente);
        return view('contactos.contactos_edit', compact(['contacto','direccion']));
    }
    public function update(Contacto $contacto){
        
        
        $data = request()->validate([
            'persona_contacto' => 'required',
            'empresa' => 'nullable',
            'nif' => ['required',Rule::unique('contacto')->ignore($contacto->id)],
            'telefono' => 'required',
            'email' => ['required','email',Rule::unique('contacto')->ignore($contacto->id)],
            'web' => 'nullable',
            'cliente' => 'nullable',
            'proveedor' => 'nullable',
            'observaciones' => 'nullable',
            'persona_contacto' => 'required',
            'calle' => 'required',
            'numero' => 'required',
            'piso' => 'nullable',
            'puerta' => 'nullable',
            'cp' => 'required',
            'provincia' => 'required',
            'poblacion' => 'required',
            'pais' => 'required',
           ]);
        if(!isset($data['cliente'])){
            $data['cliente']=0;
        }
        if(!isset($data['proveedor'])){
            $data['proveedor']=0;
        }
        $contacto->update([
            'persona_contacto' => $data['persona_contacto'],
            'empresa' => $data['empresa'],
            'nif' => $data['nif'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'web' => $data['web'],
            'cliente' => $data['cliente'],
            'proveedor' => $data['proveedor'],
            'observaciones' => $data['observaciones'],
         ]);
         $id_cliente=$contacto->id;
         $direccion=Direcciones::find($id_cliente);
         $direccion->update([
             'calle' => $data['calle'],
             'numero' => $data['numero'],
             'piso' => $data['piso'],
             'puerta' => $data['puerta'],
             'cp' => $data['cp'],
             'provincia' => $data['provincia'],
             'poblacion' => $data['poblacion'],
             'pais' => $data['pais'],
         ]);
        return redirect()->route('contactos.index');
    }
    public function info($id)
    {
        
        $contacto= Contacto::find($id);
        $id_cliente=$id;
        $direccion=Direcciones::find($id_cliente);
        return view('contactos.contactos_info', compact(['contacto','direccion']));
    }
    public function destroy($id){
        $contacto=Contacto::find($id);
        $contacto->delete();
        return redirect()->route('contactos.index');
    }

    public function search(){
        $data= request()->validate([
            'search' => 'nullable',
        ]);
        $query=$data['search'];
        $contactos = DB::select("SELECT * FROM `contacto` WHERE `persona_contacto` LIKE '%$query%' ORDER BY `persona_contacto` ASC");
        return view('contactos/contactos', compact('contactos'));
    }
    
}
