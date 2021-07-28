<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;

class CadastroController extends Controller
{
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('admin.clientes.index', [
            'clientes' => $clientes
        ]);
    }

    public function create()
    {
        return view('admin.clientes.adicionar');
    }

    public function store(Request $request)
    {
        $dados = $request->only([
            'nome',
            'cpf',
            'pis',
            'numCtps',
            'serieCtps',
            'tituloEleitor',
            'idtCivil',
            'dtExpedicao',
            'orgExpeditor',
            'nacionalidade',
            'profissao',
            'sexo',
            'estadoCivil',
            'tratamento',


        ]);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        if($cliente) {
            return view('admin.clientes.dadosCliente', [
                'cliente' => $cliente
            ]);
        }

        return redirect()->route('cliente.list');
    }

    public function processo($id)
    {

    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $cliente = Cliente::all($id);
        $cliente->delete();

        return redirect()->route('cliente.list');
    }
}
