<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facturas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
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
        $time = Carbon::now();
        $any = Carbon::createFromFormat('Y-m-d H:i:s', $time)->year;
        $Facturas = DB::select("SELECT * FROM `factura` WHERE `numero_de_factura` LIKE '%$any%'");
        $numFacturas = count($Facturas);
        $totalFacturado = 0;
        foreach ($Facturas as $Factura){
            $totalFacturado = $totalFacturado + $Factura->precio_final;
        }
        return view('home',compact(['numFacturas','totalFacturado']));
    }
}
