<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuDiarioGeneral extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'kcal',
        'proteinas',
        'grasas',
        'carbohidratos'
    ];
    protected $table = 'menu_diario_general';

    public function recetas(){
        return $this->hasMany(Receta::class);
    }

}
