@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    
    <h1 class="text-2xl font-bold mb-6 text-gray-700 border-b pb-2">🚿 Agendar Novo Serviço</h1>

    <form action="{{ route('servicos.store') }}" method="POST">
        
        @csrf

        <div class="mb-4">
            <label for="animal_id" class="block text-gray-700 font-bold mb-2">Animal:</label>
            <select id="animal_id" name="animal_id" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">-- Selecione um Animal --</option>
                @foreach ($animais as $animal)
                    <option value="{{ $animal->id }}">
                        {{ $animal->nome }} (Dono: {{ $animal->cliente?->nome }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="tipo" class="block text-gray-700 font-bold mb-2">Tipo de Serviço:</label>
            <input type="text" id="tipo" name="tipo" placeholder="Ex: Banho, Tosa Higiênica" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="data" class="block text-gray-700 font-bold mb-2">Data do Serviço:</label>
                <input type="date" id="data" name="data" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="valor" class="block text-gray-700 font-bold mb-2">Valor (R$):</label>
                <input type="number" id="valor" name="valor" step="0.01" placeholder="Ex: 50.00" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>