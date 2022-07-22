<?php

use App\Http\Controllers\Documentacion\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Documentacion\DocumentacionController;
use App\Http\Controllers\Documentacion\DocumentController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('documentacion/{slug}',[DocumentacionController::class,'show'])->name('documentacion_show');
Route::get('documentacion/',[DocumentacionController::class,'principal'])->name('documentacion');
Route::resource('programador/documentacion', DocumentController::class)->middleware('auth')->names('document');
Route::resource('programador/categorias', CategoryController::class)->middleware('auth')->names('category');
