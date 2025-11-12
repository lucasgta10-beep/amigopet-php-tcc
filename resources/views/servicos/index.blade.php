<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Serviços - AmigoPet</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 8px 12px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; }
        .btn-link { color:red; background:none; border:none; padding:0; cursor:pointer; text-decoration: underline; }
    </style>
</head>
<body>

    <h1>🚿 Lista de Serviços Agendados</h1>

    <a href="/servicos/create" class="btn">Agendar Novo Serviço</a>
    
    <p style="margin-top:15px;"><a href="/clientes">&larr; Voltar para Clientes</a></p>

    <hr>

    <table>
        <thead>
            <tr>
                <th>Serviço</th>
                <th>Animal</th>
                <th>Dono (Cliente)</th>
                <th>Data</th>
                <th>Valor (R$)</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($servicos as $servico)
                <tr>
                    <td>{{ $servico->tipo }}</td>
                    <td>{{ $servico->animal?->nome }}</td> 
                    <td>{{ $servico->animal?->cliente?->nome }}</td>
                    <td>{{ $servico->data }}</td>
                    <td>{{ $servico->valor }}</td>
                    <td>
                       <td>
                    <a href="/servicos/{{ $servico->id }}/edit">Editar</a>

                    <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-link">Apagar</button>
                    </form>
                </td>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhum serviço agendado ainda.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>