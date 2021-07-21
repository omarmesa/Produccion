<?php

use Illuminate\Database\Seeder;

class PresupuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $presupuestos =[
            [ '2021-1', '1','10.00','10','90.00','2021-07-19',],
        ];
        foreach($presupuestos as $presupuesto){
            \App\Presupuestos::create([
                'numero_de_presupuesto'=>$presupuesto[0],
                'contacto_id'=>$presupuesto[1],
                'precio_total'=> $presupuesto[2],
                'descuento'=>$presupuesto[3],
                'precio_final'=>$presupuesto[4],
                'fechaCaducidad'=>$presupuesto[5],
            ]);
        }
    }
}
