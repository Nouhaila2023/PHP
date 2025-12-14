<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Parcela;

class Finca extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ubicacion',
        'hectareas_totales',
        'descripcion',
        'user_id',
    ];

    // Relación: una finca pertenece a un usuario

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación: una finca puede tener muchas parcelas
    // Una finca tiene muchas parcelas
    public function parcelas()
    {
        return $this->hasMany(Parcela::class);
    }




}
