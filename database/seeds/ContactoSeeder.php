<?php

use Illuminate\Database\Seeder;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $contactos =[
            ['el contacto','Fusteria Banus.SL','nif123','123456789','email@email.com', 'http://fusteriabanus.com/',true,true,'todo bien'],
        ];
        foreach($contactos as $contacto){
            \App\Contacto::create([
                'persona_contacto'=>$contacto[0],
                'empresa'=>$contacto[1],
                'nif'=> $contacto[2],
                'telefono' => $contacto[3],
                'email' =>  $contacto[4],
                'web' =>  $contacto[5],
                'cliente' =>  $contacto[6],
                'proveedor' =>  $contacto[7],
                'observaciones' =>  $contacto[8],
            ]);

        }

        /*
        \App\Contacto::create([
            'persona_contacto'=>'el contacto',
            'empresa'=>'Fusteria Banus.SL',
            'nif'=> 'nif123',
            'telefono' => '123456789',
            'email' => 'email@email.com',
            'web' => 'http://fusteriabanus.com/',
            'cliente' => true,
            'proveedor' => true,
            'observaciones' => 'todo bien',
            'id_direccion' => '1',
            
        ]);*/
       
    }
}