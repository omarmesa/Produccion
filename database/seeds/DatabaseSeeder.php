<?php

use App\Facturas;
use App\Presupuestos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'users',
            'direcciones'
            

        ]);
        
        $this->call(UserSeeder::class);
        $this->call(ContactoSeeder::class);
        $this->call(ProductosSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(DireccionesSeeder::class);
        $this->call(ImpuestosSeeder::class);
        $this->call(PresupuestoSeeder::class);
        $this->call(Presupuesstos_ServicioSeeder::class);
        $this->call(Presupuesstos_productoSeeder::class);
        $this->call(FacturaSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(InversionSeeder::class);


    }
    protected function truncateTables(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
