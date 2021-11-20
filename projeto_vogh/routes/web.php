<?php

use App\Http\Controllers\PrincipalController;
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
Route::get('/', [PrincipalController::class, 'ver'])->name('home'); 
Route::get('/create', [PrincipalController::class, 'create'])->name('create')->middleware('auth'); 
Route::post('/create', [PrincipalController::class, 'store'])->name('create'); 
Route::get('/editar/{id}', [PrincipalController::class, 'edit'])->name('editar')->middleware('auth');
Route::put('/update/{id}', [PrincipalController::class, 'update'])->name('update');
Route::get('/deletar/{id}', [PrincipalController::class, 'destroy'])->name('deletar')->middleware('auth');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
