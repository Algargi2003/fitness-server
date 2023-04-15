<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable =[
        'nombre',
        'descripcion',
        'elaboracion',
        'peso',
        'kcal',
        'proteinas',
        'grasas',
        'carbohidratos'
    ];
    protected $table = 'recetas';
    public function ingredientes(){
        return $this->hasMany(Ingrediente::class);
    }
}
