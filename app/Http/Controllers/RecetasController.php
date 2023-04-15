<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\IngredienteReceta;
use App\Models\Receta;
use Illuminate\Http\Request;

class RecetasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recetas = Receta::all();
        return $recetas;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kcal = 0;
        $proteinas=0;
        $grasas=0;
        $carbohidratos=0;
        $pesoTotal = 0;


        $receta = Receta::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'elaboracion'=>$request->elaboracion
        ]);
        foreach($request->ingredientes as $ingrediente_id => $peso){
            $ingred = Ingrediente::find($ingrediente_id);
            IngredienteReceta::create([
                'ingrediente_id'=>$ingrediente_id,
                'receta_id'=>$receta->id,
                'cantidad'=>$peso
            ]);
            $kcal = $kcal+$ingred->kcal;
            $proteinas = $proteinas+$ingred->proteinas;
            $grasas = $grasas+$ingred->grasas;
            $carbohidratos = $carbohidratos+$ingred->carbohidratos;
            $pesoTotal = $pesoTotal+$peso;
        }
        $recCambiar = Receta::find($receta->id);
        $recCambiar->kcal= $kcal;
        $recCambiar->proteinas = $proteinas;
        $recCambiar->grasas = $grasas;
        $recCambiar->carbohidratos = $carbohidratos;
        $recCambiar->peso = $pesoTotal;
        $recCambiar->save();
        return $receta;

    }

    public function ingredientesReceta(int $id){
        $ir = IngredienteReceta::where('receta_id',$id)->get();
        $ingredientes = $ir->map(function($rec){
            $ing =  Ingrediente::find($rec->ingrediente_id);
            return [
                'id'=>$ing->id,
                'nombre'=>$ing->nombre,
                'kcal'=>$ing->kcal,
                'proteinas'=>$ing->proteinas,
                'grasas'=>$ing->grasas,
                'carbohidratos'=>$ing->carbohidratos,
                'cantidad'=>$rec->cantidad
            ];
        });
        return $ingredientes;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
