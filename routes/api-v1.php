<?php

use App\Http\Controllers\AccidenteController;
use App\Http\Controllers\MultaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\VehiculoController;
use App\Models\Accidente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function () {
    return view('welcome');
});

Route::controller(AccidenteController::class)->group(function(){
    Route::post('accidentes', 'store')->name('v1.accidentes.store');
    Route::get('accidentes', 'index')->name('v1.accidentes.index');
    Route::get('accidentes/{accidente}', 'show')->name('v1.accidentes.show');
    Route::put('accidentes/{accidente}', 'update')->name('v1.accidentes.update');
    Route::delete('accidentes/{accidente}', 'destroy')->name('v1.accidentes.delete');
});


Route::controller(MultaController::class)->group(function(){
    Route::post('multas', 'store')->name('v1.multas.store');
    Route::get('multas', 'index')->name('v1.multas.index');
    Route::get('multas/{multa}', 'show')->name('v1.multas.show');
    Route::put('multas/{multa}', 'update')->name('v1.multas.update');
    Route::delete('multas/{multa}', 'destroy')->name('v1.multas.delete');
});

Route::controller(PersonaController::class)->group(function(){
    Route::post('personas', 'store')->name('v1.personas.store');
    Route::get('personas', 'index')->name('v1.personas.index');
    Route::get('personas/{persona}', 'show')->name('v1.personas.show');
    Route::put('personas/{persona}', 'update')->name('v1.personas.update');
    Route::delete('personas/{persona}', 'destroy')->name('v1.personas.delete');
});

Route::controller(VehiculoController::class)->group(function(){
    Route::post('vehiculos', 'store')->name('v1.vehiculos.store');
    Route::get('vehiculos', 'index')->name('v1.vehiculos.index');
    Route::get('vehiculos/{vehiculo}', 'show')->name('v1.vehiculos.show');
    Route::put('vehiculos/{vehiculo}', 'update')->name('v1.vehiculos.update');
    Route::delete('vehiculos/{vehiculo}', 'destroy')->name('v1.vehiculos.delete');
});