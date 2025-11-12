<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Serviço - AmigoPet</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        form { max-width: 500px; margin-top: 20px; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="date"], input[type="number"], select, textarea { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 4px; }
        .btn { padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
        .btn-secondary { background-color: #6c757d; }
    </style>
</head>
<body>

    <h1>🚿 Editando Serviço</h1>

    <form action="{{ route('servicos.update', $servico->id) }}" method="POST">

        @csrf @method('PUT') <div>
            <label for="animal_id">Animal:</label>
            <select id="animal_id" name="animal_id" required>
                <option value="">-- Selecione um Animal --</option>
                @foreach ($animais as $animal)
                    <option value="{{ $animal->id }}" {{ $animal->id == $servico->animal_id ? 'selected' : '' }}>
                        {{ $animal->nome }} (Dono: {{ $animal->cliente?->nome }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="tipo">Tipo de Serviço:</label>
            <input type="text" id="tipo" name="tipo" value="{{ $servico->tipo }}" required>
        </div>

        <div>
            <label for="data">Data do Serviço:</label>
            <input type="date" id="data" name="data" value="{{ $servico->data }}" required>
        </div>

        <div>
            <label for="valor">Valor (R$):</label>
            <input type="number" id="valor" name="valor" step="0.01" value="{{ $servico->valor }}" required>
        </div>

        <div>
            <label for="descricao">Descrição (Opcional):</label>
            <textarea id="descricao" name="descricao" rows="3">{{ $servico->descricao }}</textarea>
        </div>

        <div>
            <button type="submit" class="btn">Atualizar Serviço</button>
            <a href="/servicos" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>

</body>
</html>