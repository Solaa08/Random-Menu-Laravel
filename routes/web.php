<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecetteController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/table', [TableController::class, 'index'])->name('table_index');

Route::group(['middleware' => 'auth'], function (){
    Route::get("admin",function () {
       $ingredients = \App\Models\Ingredient::orderByDesc("created_at")->take(30)->get();
       $recettes = \App\Models\Recette::orderByDesc("created_at")->take(30)->get();
       return view("admin.dashboard")
           ->with("ingredients",$ingredients)
           ->with("recette",$recettes);
    });
    Route::resource('admin/ingredient', IngredientController::class);
    Route::resource('admin/recette', RecetteController::class);
});

