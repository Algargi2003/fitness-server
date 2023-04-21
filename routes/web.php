<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecetasController;
use App\Http\Controllers\MenuGeneralController;
use App\Http\Controllers\IngredientesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('components/home');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/recetas',[RecetasController::class,'index'])->name('recetas.index');
Route::get('/recetas/{id}',[RecetasController::class,'show'])->name('recetas.show');

Route::get('/ingredientes',[IngredientesController::class,'index'])->name('ingredientes.index');
Route::post('/recetas',[RecetasController::class,'store'])->name('recetas.crear');
Route::get('/ingredientes/receta/{id?}',[RecetasController::class,'ingredientesReceta'])->name('ingredientes.receta');

Route::get('/recetas/menu/{id}',[MenuGeneralController::class,'recetasMenuDiarioGeneral'])->name('recetas.menu');
Route::get('/menus',[MenuGeneralController::class,'index'])->name('menus');

require __DIR__.'/auth.php';
