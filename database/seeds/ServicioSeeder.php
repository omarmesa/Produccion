<?php

use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Servicios =[
            ['servicio_1','es el mejor servicio','20.00','1'],
        ];
        foreach($Servicios as $Servicio){
            \App\Servicios::create([
                'titulo_servicio'=>$Servicio[0],
                'descripcion'=>$Servicio[1],
                'coste_servicio'=> $Servicio[2],
                'id_usuario'=> $Servicio[3],
            ]);
        }
        /*\App\Servicios::create([
            'titulo_servicio'=>'servicio_1',
            'descripcion'=>'es el mejor servicio',
            'coste_servicio'=>'20.00',
            'id_cliente' => '1',
        ]);*/
        
    }
}
