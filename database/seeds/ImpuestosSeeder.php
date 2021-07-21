<?php

use Illuminate\Database\Seeder;

class ImpuestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $impuestos =[
            ['IVA', 21],
            ['IRPF', -15],
        ];
        foreach($impuestos as $impuesto){
            \App\Impuestos::create([
                'nombre'=>$impuesto[0],
                'cantidad'=>$impuesto[1],
            ]);
        }
    }
}
