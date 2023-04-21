<?php

namespace App\Models;

use App\Models\Receta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingrediente extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',
        'descripcion',
        'kcal',
        'proteinas',
        'grasas',
        'carbohidratos'
    ];
    protected $table = 'ingredientes';
    public function recetas(){
        return $this->belongsToMany(Receta::class);
    }
    public function recetasUsuario(){
        return $this->belongsToMany(RecetasUsuario::class);
    }
}
