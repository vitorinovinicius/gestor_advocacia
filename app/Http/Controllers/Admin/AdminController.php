<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Processo;
use App\Models\Compromisso;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Cliente::all();
        $processos = Processo::all();
        $compromissos = Compromisso::all();
        return view('admin.home', [
            'clientes' => $clientes,
            'processos' => $processos,
            'compromissos' => $compromissos
        ]);
    }
}
