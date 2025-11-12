<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Animal - AmigoPet</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        form { max-width: 500px; margin-top: 20px; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], select { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 4px; }
        .btn { padding: 10px 15px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
        .btn-secondary { background-color: #6c757d; }
    </style>
</head>
<body>

    <h1>🐶 Novo Animal</h1>

    <form action="{{ route('animais.store') }}" method="POST">
        
        @csrf <div>
            <label for="nome">Nome do Animal:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div>
            <label for="especie">Espécie:</label>
            <input type="text" id="especie" name="especie" placeholder="Ex: Cachorro, Gato" required>
        </div>

        <div>
            <label for="raca">Raça:</label>
            <input type="text" id="raca" name="raca" placeholder="Ex: Vira-lata, Poodle" required>
        </div>

        <div>
            <label for="cliente_id">Dono (Cliente):</label>
            <select id="cliente_id" name="cliente_id" required>
                <option value="">-- Selecione um Dono --</option>
                
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="btn">Salvar Animal</button>
            <a href="/animais" class="btn btn-secondary">Cancelar</a>
        </div>
        
    </form>

</body>
</html>