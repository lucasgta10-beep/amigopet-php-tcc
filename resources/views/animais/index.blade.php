@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl font-bold text-gray-700">🐶 Lista de Animais</h1>
    <a href="/animais/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
        Cadastrar Novo Animal
    </a>
</div>

<div class="mb-4">
    <a href="/clientes" class="text-blue-600 hover:underline flex items-center">
        <span class="mr-1">&larr;</span> Voltar para Clientes
    </a>
</div>

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead class="bg-gray-200 text-gray-600">
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">Nome</th>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">Espécie</th>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">Raça</th>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">Dono</th>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">Ações</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($animais as $animal)
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-4 border-b border-gray-200">{{ $animal->nome }}</td>
                <td class="px-5 py-4 border-b border-gray-200">{{ $animal->especie }}</td>
                <td class="px-5 py-4 border-b border-gray-200">{{ $animal->raca }}</td>
                <td class="px-5 py-4 border-b border-gray-200">{{ $animal->cliente?->nome }}</td>
                <td class="px-5 py-4 border-b border-gray-200">
                    <a href="/animais/{{ $animal->id }}/edit" class="text-blue-600 hover:underline mr-3">Editar</a>
                    <form action="{{ route('animais.destroy', $animal->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Apagar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-5 py-4 text-center text-gray-500">
                    Nenhum animal cadastrado ainda.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection