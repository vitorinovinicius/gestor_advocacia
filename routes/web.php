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

Route::get('/', [Sistema\HomeController::class, 'index'])->name('home');

Route::prefix('painel')->group(function ()
{
    Route::get('/',                 [Admin\AdminController::class, 'index'])->name('admin');
    Route::get('login',             [Auth\LoginController::class, 'index'])->name('login');
    Route::post('login',            [Auth\LoginController::class, 'autenticacao']);

    Route::get('registro',          [Auth\RegistroController::class, 'index'])->name('registro');
    Route::post('registro',         [Auth\RegistroController::class, 'registro']);

    Route::post('logout',           [Auth\LoginController::class, 'logout'])->name('logout');

    Route::resource('usuarios',     Admin\UsuariosController::class)->middleware('auth');
    Route::resource('cadastro',     Admin\CadastroController::class)->middleware('auth');
    Route::resource('processo',     Admin\ProcessoController::class)->middleware('auth');
    Route::resource('servico',      Admin\ServicoController::class)->middleware('auth');


    /*Route::get('usuarios',          [Admin\UsuariosController::class, 'index'])->name('usuarios')->middleware('auth');
    Route::post('usuarios',         [Admin\UsuariosController::class, 'create'])->middleware('auth');
    Route::get('usuarios',          [Admin\UsuariosController::class, 'store'])->middleware('auth');
    Route::post('usuarios',         [Admin\UsuariosController::class, 'edit'])->middleware('auth');
    Route::put('usuarios',          [Admin\UsuariosController::class, 'update'])->middleware('auth');
    Route::delete('usuarios',       [Admin\UsuariosController::class, 'destroy'])->middleware('auth');

    Route::get('cadastro',          [Admin\CadastroController::class, 'index'])->middleware('auth');
    Route::post('cadastro',         [Admin\CadastroController::class, 'create'])->middleware('auth');
    Route::get('cadastro',          [Admin\CadastroController::class, 'store'])->middleware('auth');
    Route::post('cadastro',         [Admin\CadastroController::class, 'edit'])->middleware('auth');
    Route::put('cadastro',          [Admin\CadastroController::class, 'update'])->middleware('auth');
    Route::delete('cadastro',       [Admin\CadastroController::class, 'destroy'])->middleware('auth');

    Route::get('processo',          [Admin\ProcessoController::class, 'index'])->middleware('auth');
    Route::post('processo',         [Admin\ProcessoController::class, 'create'])->middleware('auth');
    Route::get('processo',          [Admin\ProcessoController::class, 'store'])->middleware('auth');
    Route::post('processo',         [Admin\ProcessoController::class, 'edit'])->middleware('auth');
    Route::put('processo',          [Admin\ProcessoController::class, 'update'])->middleware('auth');
    Route::delete('processo',       [Admin\ProcessoController::class, 'destroy'])->middleware('auth');

    Route::get('servico',           [Admin\ServicoController::class, 'index'])->middleware('auth');
    Route::post('servico',          [Admin\ServicoController::class, 'create'])->middleware('auth');
    Route::get('servico',           [Admin\ServicoController::class, 'store'])->middleware('auth');
    Route::post('servico',          [Admin\ServicoController::class, 'edit'])->middleware('auth');
    Route::put('servico',           [Admin\ServicoController::class, 'update'])->middleware('auth');
    Route::delete('servico',        [Admin\ServicoController::class, 'destroy'])->middleware('auth');*/

    Route::get('perfil',            [Admin\PerfilController::class, 'index'])->name('perfil')->middleware('auth');
    Route::put('salvarPerfil',      [Admin\PerfilController::class, 'save'])->name('perfil.save');

    Route::get('config',            [Admin\ConfiguracaoController::class, 'index'])->name('config');
    Route::put('salvarConfig',      [Admin\ConfiguracaoController::class, 'save'])->name('config.save');

    Route::get('pdf', [Admin\PdfController::class, 'geraPdf']);
});


