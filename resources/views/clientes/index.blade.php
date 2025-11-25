@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl font-bold text-gray-700">🐾 Lista de Clientes</h1>

    <a href="/clientes/create" 
       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
       Cadastrar Novo Cliente
    </a>
</div>

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead class="bg-gray-200 text-gray-600">
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">
                    Nome
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">
                    Telefone
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">
                    Endereço
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($clientes as $cliente)
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-4 border-b border-gray-200">{{ $cliente->nome }}</td>
                <td class="px-5 py-4 border-b border-gray-200">{{ $cliente->telefone }}</td>
                <td class="px-5 py-4 border-b border-gray-200">{{ $cliente->endereco }}</td>
                <td class="px-5 py-4 border-b border-gray-200">
                    <a href="/clientes/{{ $cliente->id }}/edit" class="text-blue-600 hover:underline mr-3">Editar</a>

                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Apagar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-5 py-4 text-center text-gray-500">
                    Nenhum cliente cadastrado ainda.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection