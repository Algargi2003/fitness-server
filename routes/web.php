<?php

use App\Http\Controllers\IngredientesController;
use App\Http\Controllers\MenuGeneralController;
use App\Http\Controllers\RecetasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recetas',[RecetasController::class,'index'])->name('recetas.index');
Route::get('/recetas/{id}',[RecetasController::class,'show'])->name('recetas.show');

Route::get('/ingredientes',[IngredientesController::class,'index'])->name('ingredientes.index');
Route::post('/recetas',[RecetasController::class,'store'])->name('recetas.crear');
Route::get('/ingredientes/receta/{id?}',[RecetasController::class,'ingredientesReceta'])->name('ingredientes.receta');

Route::get('/recetas/menu/{id}',[MenuGeneralController::class,'recetasMenuDiarioGeneral'])->name('recetas.menu');
Route::get('/menus',[MenuGeneralController::class,'index'])->name('menus');
