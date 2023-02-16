<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupsController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('Recettes');
});



Route::get('/Recettes', \App\Http\Livewire\Recettes\Recettes::class)->name('Recettes')->middleware('auth');
Route::get('/Ingredients', \App\Http\Livewire\Elements\Elements::class)->name('Ingredients')->middleware('auth');
Route::get('/Inventaire', \App\Http\Livewire\Inventaire\Inventaire::class)->name('Inventaire')->middleware('auth');


Route::get('/register' , App\Http\Livewire\Register::class)->name('register');
Route::get('/login' , App\Http\Livewire\Login::class)->name('login');
Route::get('/logout' , App\Http\Livewire\Logout::class)->name('logout');
