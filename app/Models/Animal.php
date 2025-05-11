<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $table = 'animais';

    protected $fillable = [
        'nome',
        'descricao',
        'data_nascimento',
        'especie',
        'habitat',
        'pais_origem',
    ];

    public function cuidados():HasMany
    {
        return $this->hasMany(Cuidado::class);
    }


}
