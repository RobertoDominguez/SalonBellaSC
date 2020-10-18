<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'administrador',
                'email'=>'administrador@bellasantacruz.com',
                'password'=>Hash::make('BellaSc2020'),
            ],
        ]);

        DB::table('branches')->insert([
            [
                'name'=>'Salon Bella Santa cruz Cosmetics &Spa',
                'direction'=>'Av. Paraguá 4 cuadras exactamente del 2 al 3 anillo Nro 2300.'
            ],
            [
                'name'=>'Salon Bella Santa cruz Cosmetics &Spa Centro',
                'direction'=>'Calle Sucre 705, esquina calle Oruro, una cuadra antes del 1er anillo, al lado de la escuela el "Mana", Salon Bella Santa Cruz.'
            ],
            [
                'name'=>'Salon Bella Santa cruz Cosmetics &Spa Centenario',
                'direction'=>'Sobre el 2 anillo entre #Centenario y Roca y coronado nro 904 a una cuadra de PAT como yendo a la roca y coronado.'
            ]
        ]);
    }
}
