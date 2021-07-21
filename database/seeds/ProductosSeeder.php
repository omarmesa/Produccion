<?php

use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $productos =[
            ['producto_1','3243r78585','20.00','200','el mejor descripcion','1'],
        ];
        foreach($productos as $producto){
            \App\Productos::create([
                'nombre'=>$producto[0],
                'sku'=>$producto[1],
                'precio'=> $producto[2],
                'stock'=> $producto[3],
                'descripcion'=> $producto[4],
                'id_usuario'=>$producto[5],
                
            ]);
        }/*
        \App\Productos::create([
            'nombre'=>'producto_1',
            'sku'=>'3243r78585',
            'precio'=>'20.00',
            'stock' => '200'
        ]);*/
    }
}
