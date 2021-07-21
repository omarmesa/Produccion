<?php

use Illuminate\Database\Seeder;

class DireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $direcciones =[
            ['Av Baix Penedes','45','3','b','08800','El Garraf','Vilanova','1'],
        ];
        foreach($direcciones as $direccion){
            \App\Direcciones::create([
                'calle'=>$direccion[0],
                'numero'=>$direccion[1],
                'piso'=> $direccion[2],
                'puerta'=>$direccion[3],
                'cp'=>$direccion[4],
                'provincia'=>$direccion[5],
                'poblacion'=>$direccion[6],
                'id_cliente'=>$direccion[7],
            ]);

          
        }
        

    }
}



