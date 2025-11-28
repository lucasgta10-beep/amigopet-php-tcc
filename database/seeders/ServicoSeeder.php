<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('servicos')->insert([
            [
                'tipo' => 'Banho Completo',
                'descricao' => 'Banho com shampoo anti-pulgas',
                'data' => '2025-11-20',
                'valor' => 80.00,
                'animal_id' => 1, // Para o Rex
            ],
            [
                'tipo' => 'Tosa Higiênica',
                'descricao' => 'Apenas aparar os pelos',
                'data' => '2025-11-21',
                'valor' => 50.00,
                'animal_id' => 2, // Para a Mia
            ]
        ]);
    }
}