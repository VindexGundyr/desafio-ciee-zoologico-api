<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cuidado extends Model
{
     use HasFactory;
     protected $table = 'cuidados';

      protected $fillable = [
        'animal_id',
        'nome_cuidado',
        'descricao',
        'frequencia',
    ];

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
}
