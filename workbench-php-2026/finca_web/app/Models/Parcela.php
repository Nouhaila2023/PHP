<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Finca;
use App\Models\TipoCultivo;

class Parcela extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'finca_id',
        'tipo_cultivo_id',
        'hectareas',
        'fecha_siembra',
        'estado',
        'notas',
    ];

    // Una parcela pertenece a una finca

    public function finca()
    {
        return $this->belongsTo(Finca::class);
    }

    // Una parcela tiene un tipo de cultivo asignado

    public function tipoCultivo()
    {
        return $this->belongsTo(TipoCultivo::class);
    }

}
