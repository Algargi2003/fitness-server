<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaMenuDiario extends Model
{
    use HasFactory;
    protected $table = 'recetas_menu_diario';
    protected $fillable =[
        'nombre',
        'kcal',
        'proteinas',
        'grasas',
        'carbohidratos'
    ];
}
