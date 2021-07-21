<?php
use Illuminate\Support\Facades\Hash;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $clientes =[
            ['admin','admin@gmail.com',Hash::make('12345678')],
        ];
        foreach($clientes as $cliente){
            \App\User::create([
                'name'=>$cliente[0],
                'email'=>$cliente[1],
                'password'=> $cliente[2],
            ]);

            
        }
       
        
    }
}
