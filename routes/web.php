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


Route::resource('fournisseurs', App\Http\Controllers\FournisseurController::class)->middleware('auth');


Route::resource('inventaires', App\Http\Controllers\InventaireController::class)->middleware('auth');


Route::resource('unites', App\Http\Controllers\UniteController::class)->middleware('auth');


Route::resource('produits', App\Http\Controllers\ProduitController::class)->middleware('auth');


Route::resource('inventaireLignes', App\Http\Controllers\InventaireLigneController::class)->middleware('auth');


Route::resource('entreeStocks', App\Http\Controllers\EntreeStockController::class)->middleware('auth');


Route::resource('bonLivraisons', App\Http\Controllers\BonLivraisonController::class)->middleware('auth');


Route::resource('sortieStocks', App\Http\Controllers\SortieStockController::class)->middleware('auth');




Route::resource('inventaireLignes', App\Http\Controllers\InventaireLigneController::class)->middleware('auth');


Route::resource('entreeStocks', App\Http\Controllers\EntreeStockController::class)->middleware('auth');


Route::resource('bonLivraisons', App\Http\Controllers\BonLivraisonController::class)->middleware('auth');


Route::resource('sortieStocks', App\Http\Controllers\SortieStockController::class)->middleware('auth');


Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');


Route::resource('permissions', App\Http\Controllers\PermissionController::class)->middleware('auth');


Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware('auth');
