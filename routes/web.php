<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\AreaAtuacaoController;
use App\Http\Controllers\UsuarioController;

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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => 'v1', 'middleware' => 'auth:web'], function () {

    /**
     * Rotas das fichas do eleitor
     */
    Route::get('fichas', [FichaController::class, 'index'])->name('fichas.index');
    Route::get('relatorio', [FichaController::class, 'relatorio'])->name('fichas.relatorio');
    Route::post('fichas', [FichaController::class, 'store'])->name('fichas.store');
    Route::get('fichas/create', [FichaController::class, 'create'])->name('fichas.create');
    Route::get('fichas/{ficha}', [FichaController::class, 'show'])->name('fichas.show');
    Route::put('fichas/{ficha}', [FichaController::class, 'update'])->name('fichas.update');
    Route::delete('fichas/{ficha}', [FichaController::class, 'destroy'])->name('fichas.destroy');
    Route::get('fichas/{ficha}/edit', [FichaController::class, 'edit'])->name('fichas.edit');
    Route::post('fichas/cidades', [FichaController::class, 'cidades'])->name('fichas.cidades');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('user/{id}/edit', [UsuarioController::class, 'edit'])->name('user.edit');
    Route::put('user/{id}', [UsuarioController::class, 'update'])->name('user.update');

    /**
     * crud de usuários
     */
    Route::get('users', [UsuarioController::class, 'index'])->name('users.index');
    Route::post('users', [UsuarioController::class, 'store'])->name('users.store');
    Route::get('users/create', [UsuarioController::class, 'create'])->name('users.create');
    Route::get('users/{user}', [UsuarioController::class, 'show'])->name('users.show');
    Route::put('users/{user}', [UsuarioController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UsuarioController::class, 'destroy'])->name('users.destroy');
    Route::get('users/{user}/edit', [UsuarioController::class, 'edit'])->name('users.edit');

    /**
     * crud de área de atuação
     */
    Route::get('area-atuacao', [AreaAtuacaoController::class, 'index'])->name('area-atuacao.index');
    Route::post('area-atuacao', [AreaAtuacaoController::class, 'store'])->name('area-atuacao.store');
    Route::get('area-atuacao/create', [AreaAtuacaoController::class, 'create'])->name('area-atuacao.create');
    Route::get('area-atuacao/{id}', [AreaAtuacaoController::class, 'show'])->name('area-atuacao.show');
    Route::put('area-atuacao/{id}', [AreaAtuacaoController::class, 'update'])->name('area-atuacao.update');
    Route::delete('area-atuacao/{id}', [AreaAtuacaoController::class, 'destroy'])->name('area-atuacao.destroy');
    Route::get('area-atuacao/{id}/edit', [AreaAtuacaoController::class, 'edit'])->name('area-atuacao.edit');
});
