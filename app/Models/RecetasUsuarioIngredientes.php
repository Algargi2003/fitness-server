<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetasUsuarioIngredientes extends Model
{
    use HasFactory;

    protected $fillable=[
        'ingrediente_id',
        'receta_id',
        'cantidad',
        'kcal',
        'proteinas',
        'grasas',
        'carbohidratos'
    ];
    protected $table='recetas_usuario_ingredientes';
}
