<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'endereco'
    ];

    public function animais()
    {
        return $this->hasMany(Animal::class, 'cliente_id');
    }
}
