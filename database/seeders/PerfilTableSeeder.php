<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perfil;

class PerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::create([
            'name' => 'Administrador'
        ]);

        Perfil::create([
            'name' => 'Líder cidade'
        ]);

        Perfil::create([
            'name' => 'Liderança'
        ]);

        Perfil::create([
            'name' => 'Pessoa'
        ]);
    }
}
