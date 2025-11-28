<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Servico extends Model
{
    use HasFactory;

    /**
     * Informa o Laravel que a nossa tabela se chama 'servicos' (português)
     * em vez de 'servicos' (inglês, que ele assumiria).
     */
    protected $table = 'servicos';

    /**
     * Define o relacionamento: Um Serviço "Pertence a" (belongsTo) um Animal.
     * Esta é a função 'animal' que o Controller (no with()) está a procurar.
     */
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
}