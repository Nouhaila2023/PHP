<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCultivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nombre_cientifico',
        'familia',
        'ciclo',
        'descripcion',
    ];

    // Relación: un tipo de cultivo puede estar en muchas parcelas
    public function parcelas()
    {
        return $this->hasMany(Parcela::class);
    }


}
