<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Chama os seeders que você deseja rodar
        $this->call(UserSeeder::class); // Por exemplo, chamando o AdminSeeder
    }
}
