<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredienteReceta extends Model
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
    protected $table='ingrediente_receta';
}
