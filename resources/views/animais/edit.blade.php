@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    
    <h1 class="text-2xl font-bold mb-6 text-gray-700 border-b pb-2">🐶 Editar Animal</h1>

    <form action="{{ route('animais.update', $animal->id) }}" method="POST">
        
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nome" class="block text-gray-700 font-bold mb-2">Nome do Animal:</label>
            <input type="text" id="nome" name="nome" value="{{ $animal->nome }}" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="especie" class="block text-gray-700 font-bold mb-2">Espécie:</label>
                <input type="text" id="especie" name="especie" value="{{ $animal->especie }}" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="raca" class="block text-gray-700 font-bold mb-2">Raça:</label>
                <input type="text" id="raca" name="raca" value="{{ $animal->raca }}" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>

        <div class="mb-6">
            <label for="cliente_id" class="block text-gray-700 font-bold mb-2">Dono (Cliente):</label>
            <select id="cliente_id" name="cliente_id" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">-- Selecione um Dono --</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $cliente->id == $animal->cliente_id ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-end space-x-4">
            <a href="/animais" class="text-gray-600 hover:text-gray-800 font-semibold">Cancelar</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                Atualizar Animal
            </button>
        </div>
        
    </form>
</div>

@endsection