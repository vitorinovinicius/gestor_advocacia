<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sistema;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth;

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

Route::get('/', [Sistema\HomeController::class, 'index']);

Route::prefix('painel')->group(function ()
{
    Route::get('/', [Admin\AdminController::class, 'index'])->name('admin');
    Route::get('login', [Auth\LoginController::class, 'index'])->name('login');
    Route::post('login', [Auth\LoginController::class, 'autenticacao']);

    Route::get('registro', [Auth\RegistroController::class, 'index'])->name('registro');
    Route::post('registro', [Auth\RegistroController::class, 'registro']);

    Route::post('logout', [Auth\LoginController::class, 'logout'])->name('logout');

    Route::resource('usuarios', Admin\UsuariosController::class);
    Route::resource('paginas', Admin\PaginasController::class);
    Route::resource('cadastro', Admin\CadastroController::class);
    Route::resource('processo', Admin\ProcessoController::class);

    Route::get('perfil', [Admin\PerfilController::class, 'index'])->name('perfil');
    Route::put('salvarPerfil', [Admin\PerfilController::class, 'save'])->name('perfil.save');

    Route::get('config', [Admin\ConfiguracaoController::class, 'index'])->name('config');
    Route::put('salvarConfig', [Admin\ConfiguracaoController::class, 'save'])->name('config.save');
});
