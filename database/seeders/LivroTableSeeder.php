<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livro;
use Carbon\Carbon;

class LivroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++):
            Livro::create([
                'titulo' => 'Título do Livro ' . $i,
                'descricao' => 'Breve descrição do livro ' . $i,
                'autor' => 'Walquirio Saraiva Rocha',
                'numero_pagina' => 350,
                'data_cadastro' => Carbon::now(),
            ]);
        endfor;
    }
}
