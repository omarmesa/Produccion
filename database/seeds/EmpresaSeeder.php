<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresas = [

            ['Daniel González Donaire', 'ES56 0081 1661 7800 0114 2220', 'logo.jpg', 'info@iceond.com', '611427968', '48100949Z', 'C/ Riu Ebre nº.29 b', '08800, Vilanova i la Geltrú']
        ];

        foreach ($empresas as $empresa) {
            $empre = new Empresa();
            $empre->nombre = $empresa[0];
            $empre->iban = $empresa[1];
            $empre->logo = $empresa[2];
            $empre->email = $empresa[3];
            $empre->telefono = $empresa[4];
            $empre->nif = $empresa[5];
            $empre->poblacion = $empresa[6];
            $empre->direccion = $empresa[7];
            $empre->save();
        }
    }
}
