<?php

namespace Database\Seeders;

use App\Models\AreaAtuacao;
use Illuminate\Database\Seeder;

class AreaAtuacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AreaAtuacao::create([
            'name' => 'Taxista'
        ]);

        AreaAtuacao::create([
            'name' => 'Feirante'
        ]);

        AreaAtuacao::create([
            'name' => 'DFtrans'
        ]);

        AreaAtuacao::create([
            'name' => 'Outros'
        ]);
    }
}
