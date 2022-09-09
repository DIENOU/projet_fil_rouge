<?php

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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
























Route::resource('clients', App\Http\Controllers\ClientController::class)->middleware('auth');


Route::resource('fournisseurs', App\Http\Controllers\FournisseurController::class);


Route::resource('inventaires', App\Http\Controllers\InventaireController::class);


Route::resource('unites', App\Http\Controllers\UniteController::class);


Route::resource('produits', App\Http\Controllers\ProduitController::class);


Route::resource('inventaireLignes', App\Http\Controllers\InventaireLigneController::class);


Route::resource('entreeStocks', App\Http\Controllers\EntreeStockController::class);


Route::resource('bonLivraisons', App\Http\Controllers\BonLivraisonController::class);


Route::resource('sortieStocks', App\Http\Controllers\SortieStockController::class);




Route::resource('inventaireLignes', App\Http\Controllers\InventaireLigneController::class);


Route::resource('entreeStocks', App\Http\Controllers\EntreeStockController::class);


Route::resource('bonLivraisons', App\Http\Controllers\BonLivraisonController::class);


Route::resource('sortieStocks', App\Http\Controllers\SortieStockController::class);
