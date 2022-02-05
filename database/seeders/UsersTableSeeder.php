<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Edilton Costa',
            'email' => 'ediltoncosta@gmail.com',
            'password' => bcrypt('123456'),
            'id_perfil' => 1,
        ]);
    }
}
