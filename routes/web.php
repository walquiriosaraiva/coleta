<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\ClimaRegiaoController;
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
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => 'v1', 'middleware' => 'auth:web'], function () {
    Route::get('livros', [LivroController::class, 'index'])->name('livros.index');
    Route::post('livros', [LivroController::class, 'store'])->name('livros.store');
    Route::get('livros/create', [LivroController::class, 'create'])->name('livros.create');
    Route::get('livros/{livro}', [LivroController::class, 'show'])->name('livros.show');
    Route::put('livros/{livro}', [LivroController::class, 'update'])->name('livros.update');
    Route::delete('livros/{livro}', [LivroController::class, 'destroy'])->name('livros.destroy');
    Route::get('livros/{livro}/edit', [LivroController::class, 'edit'])->name('livros.edit');

    /**
     * Rotas das fichas do eleitor
     */
    Route::get('fichas', [FichaController::class, 'index'])->name('fichas.index');
    Route::post('fichas', [FichaController::class, 'store'])->name('fichas.store');
    Route::get('fichas/create', [FichaController::class, 'create'])->name('fichas.create');
    Route::get('fichas/{ficha}', [FichaController::class, 'show'])->name('fichas.show');
    Route::put('fichas/{ficha}', [FichaController::class, 'update'])->name('fichas.update');
    Route::delete('fichas/{ficha}', [FichaController::class, 'destroy'])->name('fichas.destroy');
    Route::get('fichas/{ficha}/edit', [FichaController::class, 'edit'])->name('fichas.edit');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('user/{id}/edit', [UsuarioController::class, 'edit'])->name('user.edit');
    Route::put('user/{id}', [UsuarioController::class, 'update'])->name('user.update');
});
