<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- ADICIONE ESTA
use App\Models\Cliente; // <-- ADICIONE ESTA (embora às vezes não precise, é boa prática)
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animal extends Model
{
//... 
    use HasFactory;
    protected $table = 'animais';

    /**
     * Define o relacionamento: Um Animal "Pertence a" (belongsTo) um Cliente.
     * Esta é a função 'cliente' que o Controller (na linha 24) estava a procurar.
     */
    public function cliente()
    {
        // O Laravel vai usar a coluna 'cliente_id' (por defeito) para
        // encontrar o registo na tabela 'clientes'.
        return $this->belongsTo(Cliente::class);
    }
}