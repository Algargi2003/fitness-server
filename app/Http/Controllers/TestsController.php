<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Test::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //El test tiene que pasarme:
    //objetivo: ganar/perder
    //peso
    //FactorActividad: 14->Ejercicio Ligero(1-3 dias/semana)
    //                 16->Ejercicio Moderado(3-5 dias/semana)
    //                 18->Ejercicio Fuerte(6-7 dias/semana)
    //                 20->Ejercicio Muy Fuerte(Dobles sesiones todos los dias)
    //
        $caloriasConsumir = $request->peso*22*($request->factor_actividad/10);    
        $proteinasConsumir=0;
        $grasasConsumir = 0;
        if($request->objetivo=='ganar'){
            $caloriasConsumir = $caloriasConsumir+$caloriasConsumir*(15/100);
            $proteinasConsumir = 2*$request->peso;
            $grasasConsumir = (12/10)*$request->peso;
        }
        if($request->objetivo=='perder'){
            $caloriasConsumir = $caloriasConsumir-$caloriasConsumir*(20/100);
            $proteinasConsumir = (23/10)*$request->peso;
            $grasasConsumir = (8/10)*$request->peso;
        }

        $caloriasProteinas = $proteinasConsumir*4;
        $caloriasGrasas = $grasasConsumir*9;


        $caloriasHidratos = $caloriasConsumir-($caloriasProteinas+$caloriasProteinas);
        $hidratosConsumir = $caloriasHidratos/4;
        $test = Test::create([
            'user_id'=>$request->user_id,
            'kcal'=>round($caloriasConsumir,2),
            'proteinas'=>round($proteinasConsumir,2),
            'grasas'=>round($grasasConsumir,2),
            'carbohidratos'=>round($hidratosConsumir,2)
        ]);
        return $test;
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
