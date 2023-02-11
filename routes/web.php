<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupsController;

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
    return redirect()->route('Dashboard');
});

Route::get('/template', function () {
    return view('template');
});

Route::get('/Dashboard', [DashboardController::class, 'index'])->name('Dashboard');
Route::get('/Groups', [GroupsController::class, 'index'])->name('Groups');;
Route::get('/Recettes', [\App\Http\Controllers\RecettesController::class, 'index'])->name('Recettes');
Route::get('/Ingredients', [\App\Http\Controllers\IngredientsController::class, 'index'])->name('Ingredients');;
Route::get('/Inventaire', [\App\Http\Controllers\InventaireController::class, 'index'])->name('Inventaire');;


Route::get('/Settings', [\App\Http\Controllers\SettingsController::class, 'index'])->name('Settings');

