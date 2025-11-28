<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animais';

    protected $fillable = [
        'nome',
        'especie',
        'raca',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function servicos()
    {
        return $this->hasMany(Servico::class, 'animal_id');
    }
}
