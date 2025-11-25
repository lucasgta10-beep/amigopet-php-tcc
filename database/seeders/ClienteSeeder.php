<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <-- Importante para funcionar

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'nome' => 'Ana Silva',
                'telefone' => '21999998888',
                'endereco' => 'Rua das Flores, 123',
            ],
            [
                'nome' => 'Carlos Souza',
                'telefone' => '21988887777',
                'endereco' => 'Av. Central, 500',
            ]
        ]);
    }
}