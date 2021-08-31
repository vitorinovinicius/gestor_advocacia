<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Processo;
use App\Models\Servico;
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
        $servicos = Servico::all();
        return view('admin.home', [
            'clientes' => $clientes,
            'processos' => $processos,
            'servicos' => $servicos
        ]);
    }
}
