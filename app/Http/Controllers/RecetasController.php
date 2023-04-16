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
                'cantidad'=>$peso,
                'kcal'=>$ingred->kcal*$peso/100,
                'proteinas'=>$ingred->proteinas*$peso/100,
                'grasas'=>$ingred->grasas*$peso/100,
                'carbohidratos'=>$ingred->carbohidratos*$peso/100
            ]);
            $relacionCalorias = ($ingred->kcal*$peso)/100;
            $relacionProteinas = $ingred->proteinas*$peso/100;
            $relacionGrasas = $ingred->grasas*$peso/100;
            $relacionCarboHidratos = $ingred->carbohidratos*$peso/100;
            $kcal = $kcal+$relacionCalorias;
            $proteinas = $proteinas+$relacionProteinas;
            $grasas = $grasas+$relacionGrasas;
            $carbohidratos = $carbohidratos+$relacionCarboHidratos;
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
        $receta = Receta::find($id);

        // $ingredientes = $ir->map(function($rec){
        //     $ing =  Ingrediente::find($rec->ingrediente_id);
        //     return [
        //         // 'id'=>$ing->id,
        //         // 'nombre'=>$ing->nombre,
        //         // 'kcal'=>$rec->kcal,
        //         // 'proteinas'=>$rec->proteinas,
        //         // 'grasas'=>$rec->grasas,
        //         // 'carbohidratos'=>$rec->carbohidratos,
        //         // 'cantidad'=>$rec->cantidad
        //         $ing
        //     ];
        // });
        return $ir;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return Receta::find($id);
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
