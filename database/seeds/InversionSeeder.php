<?php

use Illuminate\Database\Seeder;
use App\Inversion;

class InversionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inversions = [

            ['Ladrillos', '10', '20.00', 'ABC',],
        ];

        foreach ($inversions as $inversion) {

            Inversion::create([
                'producto'=>1,
                'cantidad'=>$inversion[1],
                'precio'=> $inversion[2],
                'proveedor'=>1,
            ]);

        }
    }
}
