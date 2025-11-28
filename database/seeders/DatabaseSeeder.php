<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Chama os nossos seeders na ordem correta
        $this->call([
            ClienteSeeder::class,
            AnimalSeeder::class,
            ServicoSeeder::class,
        ]);
    }
}
