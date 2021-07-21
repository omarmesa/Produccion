<?php

use Illuminate\Database\Seeder;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $facturas =[
            [ '2021-1','1','10.00','10','102.6','null','1',],
        ];
        foreach($facturas as $factura){
            \App\Facturas::create([
                'numero_de_factura'=>$factura[0],
                'contacto_id'=>$factura[1],
                'presupuesto_id'=>$factura[6],
                'precio_total'=> $factura[2],
                'descuento'=>$factura[3],
                'precio_final'=>$factura[4],
                'fechaCaducidad'=>$factura[5],
            ]);
        }
    }
}
