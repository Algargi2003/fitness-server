<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\IngredienteReceta;
use App\Models\Receta;
use App\Models\RecetasUsuario;
use App\Models\RecetasUsuarioIngredientes;
use App\Models\Test;
use Illuminate\Http\Request;

class RecetasUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return RecetasUsuarioIngredientes::where('receta_id',8)->get();
        return RecetasUsuarioIngredientes::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $relacionDesayuno = 20/100;
        $relacionComida = 40/100;
        $relacionMerienda = 15/100;
        $relacionCena = 25/100;

        $recetaGeneral = Receta::find($request->recetaGeneral_id);
        $test = Test::find($request->test_id);

        $caloriasDesayuno = $test->kcal*$relacionDesayuno;
        $caloriasComida = $test->kcal*$relacionComida;
        $caloriasMerienda = $test->kcal*$relacionMerienda;
        $caloriasCena = $test->kcal*$relacionCena;


        $ingredientesGeneralesRelacion = IngredienteReceta::where('receta_id', $recetaGeneral->id)->get();
        $ingredientesGenerales = $ingredientesGeneralesRelacion->map(function ($rec) {
            // return Ingrediente::find($rec->ingrediente_id);
            $ing =  Ingrediente::find($rec->ingrediente_id);
            return [
                'id'=>$ing->id,
                'receta_id'=>$rec->receta_id,
                'nombre'=>$ing->nombre,
                'kcal'=>$rec->kcal,
                'peso'=>$rec->cantidad,
                'proteinas'=>$rec->proteinas,
                'grasas'=>$rec->grasas,
                'carbohidratos'=>$rec->carbohidratos
                
            ];
        });


        //la request pasa: id de RecetaGeneral, idTest?
        $receta = RecetasUsuario::create([
            'nombre' => $recetaGeneral->nombre,
            'user_id'=>$test->user_id,
            'descripcion' => $recetaGeneral->descripcion,
            'elaboracion' => $recetaGeneral->elaboracion,
            'tipo'=> $recetaGeneral->tipo
            // 'peso',
            // 'kcal',
            // 'proteinas',
            // 'grasas',
            // 'carbohidratos'
        ]);
        $kcalFinales = 0.0;
        $proteinasFinales=0.0;
        $grasasFinales=0.0;
        $carbohidratosFinales=0.0;
        $pesoTotal = 0.0;
        foreach ($ingredientesGenerales as $ingredDato => $ingredValor) {
            $caloriasObjetivo = 0;
            if($receta->tipo == 'desayuno'){
                $caloriasObjetivo = $caloriasDesayuno;
            }
            if($receta->tipo == 'comida'){
                $caloriasObjetivo = $caloriasComida;
            }
            if($receta->tipo == 'merienda'){
                $caloriasObjetivo = $caloriasMerienda;
            }
            if($receta->tipo == 'cena'){
                $caloriasObjetivo = $caloriasCena;
            }
            //Porcentaje de ingrediente en la receta original
            $porcentajeIngrediente = ($ingredValor['peso']*100)/$recetaGeneral->peso;

            //Peso receta para cumplir con las calorias correspondientes de la comida
            $pesoParaKcalCorrespondiente = $recetaGeneral->peso*$caloriasObjetivo/$recetaGeneral->kcal;

            //Calcular el resultado del porcentaje de pesoParaKcalCorrespondiente
            $cantidadMeter = $porcentajeIngrediente*$pesoParaKcalCorrespondiente/100;

            //Cantidad KCAL a meter
            $kcalMeter = $porcentajeIngrediente*$caloriasObjetivo/100;
            //Cantidad Proteinas, Grasas y carbohidratos a meter
            $proteinasMeter = $recetaGeneral->proteinas*$cantidadMeter/$ingredValor['peso'];
            $grasasMeter = $recetaGeneral->grasas*$cantidadMeter/$ingredValor['peso'];
            $carbohidratosMeter = $recetaGeneral->carbohidratos*$cantidadMeter/$ingredValor['peso'];
            // dd($carbohidratosMeter);
            RecetasUsuarioIngredientes::create([
                'ingrediente_id'=>$ingredValor['id'],
                'receta_id'=>$receta->id,
                //Para variar lo que necesita cada persona lo que cambia es la cantidad, no el ingrediente ni nada
                'cantidad'=>$cantidadMeter,
                'kcal'=>$kcalMeter,
                'proteinas'=>$proteinasMeter,
                'grasas'=>$grasasMeter,
                'carbohidratos'=>$carbohidratosMeter
            ]);
            $pesoTotal = $pesoTotal+$cantidadMeter;
            $kcalFinales= $kcalFinales+$kcalMeter;
            $proteinasFinales= $proteinasFinales+$proteinasMeter;
            $grasasFinales = $grasasFinales+$grasasMeter;
            $carbohidratosFinales = $carbohidratosFinales+$carbohidratosMeter;
        }
        $recCambiar = RecetasUsuario::find($receta->id);
        $recCambiar->peso = round($pesoTotal, 2);
        $recCambiar->kcal = $kcalFinales;
        $recCambiar->proteinas = round($proteinasFinales,2);
        $recCambiar->grasas = round($grasasFinales,2);
        $recCambiar->carbohidratos = round($carbohidratosFinales,2);
        $recCambiar->save();
        return $receta;
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
