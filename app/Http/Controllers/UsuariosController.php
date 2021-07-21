<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
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
        $usuarios=User::all();
        $usuarios = $usuarios->sortByDesc('created_at');
        return view('usuarios/usuarios', compact('usuarios'));
    }
    public function create()
    {
        return view('usuarios/usuarios_create');
    }
    public function store()
    {

        $data=request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password2' => 'required|min:8|same:password',
        ]);
        $usuario=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('usuarios.index');

    }
    public function search(){
        $data= request()->validate([
            'search' => 'nullable',
        ]);
        $query=$data['search'];
        $usuarios = DB::select("SELECT * FROM `users` WHERE `name` LIKE '%$query%' ORDER BY `name` ASC");
        return view('usuarios/usuarios', compact('usuarios'));
    }
    public function edit($id){
        $usuario= User::find($id);
        return view('usuarios/usuarios_edit', compact('usuario'));
    }
    public function update($id){
        
        $usuario= User::find($id);
     
        $data=request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password2' => 'required|min:8|same:password',
        ]);
        
        $usuario->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('usuarios.index');
    }
    public function info($id){
        $usuario=User::find($id);
        return view('usuarios/usuarios_info', compact('usuario'));
    }
    public function destroy($id){
        $usuario=User::find($id);
        $usuario->delete();
        return redirect()->route('usuarios.index');

    }
}
