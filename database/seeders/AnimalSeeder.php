<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('animais')->insert([
            [
                'nome' => 'Rex',
                'especie' => 'Cachorro',
                'raca' => 'Labrador',
                'cliente_id' => 1, // Pertence à Ana
            ],
            [
                'nome' => 'Mia',
                'especie' => 'Gato',
                'raca' => 'Siamês',
                'cliente_id' => 2, // Pertence ao Carlos
            ]
        ]);
    }
}