@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    
    <h1 class="text-2xl font-bold mb-6 text-gray-700 border-b pb-2">🐾 Editar Cliente</h1>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nome" class="block text-gray-700 font-bold mb-2">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $cliente->nome }}" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="telefone" class="block text-gray-700 font-bold mb-2">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="{{ $cliente->telefone }}" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-6">
            <label for="endereco" class="block text-gray-700 font-bold mb-2">Endereço:</label>
            <input type="text" id="endereco" name="endereco" value="{{ $cliente->endereco }}" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="flex items-center justify-end space-x-4">
            <a href="/clientes" class="text-gray-600 hover:text-gray-800 font-semibold">Cancelar</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                Atualizar Cliente
            </button>
        </div>
        
    </form>
</div>

@endsection