@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl font-bold text-gray-700">🚿 Lista de Serviços</h1>
    <a href="/servicos/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
        Agendar Novo Serviço
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
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">Serviço</th>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">Animal</th>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">Dono</th>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">Data</th>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">Valor</th>
                <th class="px-5 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold uppercase">Ações</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($servicos as $servico)
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-4 border-b border-gray-200">{{ $servico->tipo }}</td>
                <td class="px-5 py-4 border-b border-gray-200">{{ $servico->animal?->nome }}</td>
                <td class="px-5 py-4 border-b border-gray-200">{{ $servico->animal?->cliente?->nome }}</td>
                
                <td class="px-5 py-4 border-b border-gray-200">
                    {{ date('d/m/Y', strtotime($servico->data)) }}
                </td>
                
                <td class="px-5 py-4 border-b border-gray-200">
                    R$ {{ number_format($servico->valor, 2, ',', '.') }}
                </td>

                <td class="px-5 py-4 border-b border-gray-200">
                    <a href="/servicos/{{ $servico->id }}/edit" class="text-blue-600 hover:underline mr-3">Editar</a>
                    <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Apagar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-5 py-4 text-center text-gray-500">
                    Nenhum serviço agendado ainda.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection