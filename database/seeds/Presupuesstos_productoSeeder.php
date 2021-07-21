<?php

use Illuminate\Database\Seeder;

class Presupuesstos_productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $presupeustos_producto =[
            [ '1', '1','buen producto','1','producto de calidad','100.00',],
        ];      
        foreach($presupeustos_producto as $presupeusto_producto){
            \App\Presupuestos_producto::create([
                'id_presupuesto'=>$presupeusto_producto[0],
                'id_producto'=>$presupeusto_producto[1],
                'titulo'=> $presupeusto_producto[2],
                'cantidad'=>$presupeusto_producto[3],
                'observaciones'=>$presupeusto_producto[4],
                'precio'=>$presupeusto_producto[5],
            ]);
        }
    }
}
