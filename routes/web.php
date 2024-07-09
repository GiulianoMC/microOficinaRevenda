<?php

use App\Http\Controllers\AcabamentoController;
use App\Http\Controllers\ProdutoController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/', [AcabamentoController::class, 'index']);
Route::post('/calcular-preco', [ProdutoController::class, 'getPreco'])->name('calcular.preco');
