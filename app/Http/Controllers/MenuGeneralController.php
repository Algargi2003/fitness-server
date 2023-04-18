<?php

namespace App\Http\Controllers;

use App\Models\MenuDiarioGeneral;
use App\Models\Receta;
use App\Models\RecetaMenuDiario;
use Illuminate\Http\Request;

class MenuGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = MenuDiarioGeneral::all();
        return $menus;
    }
    public function recetasMenuDiarioGeneral(int $id){
        $menu = MenuDiarioGeneral::find($id);
        $mr = RecetaMenuDiario::where('menu_diario_id',$id)->get();

        $recetas = $mr->map(function($rec){
            return Receta::find($rec->receta_id);
        });

        return $recetas;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
