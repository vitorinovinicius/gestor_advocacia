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
            'profissao',
            'sexo',
            'estadoCivil',
            'tratamento',
            'numCtps',
            'serieCtps',
            'nacionalidade',
            'codMatricula',
            'dtNascimento',
            'tituloEleitor',
            'idtCivil',
            'dtExpedicao',
            'orgExpeditor',
            'nomeMae'

        ]);

        $validador = Validator::make($dados, [
            'nome' => ['required', 'string', 'max:100'],
            'cpf' => ['required', 'string', 'max:15', 'unique:pessoas_fisicas'],
            'pis' => ['required', 'string', 'max:15', 'unique:pessoas_fisicas'],
            'profissao' => ['required', 'string', 'max'],
            'sexo' => ['required', 'string', 'max:'],
            'estadoCivil' => ['required', 'string', 'max:'],
            'tratamento' => ['required', 'string', 'max:'],
            'numCtps' => ['required', 'string', 'max:'],
            'serieCtps' => ['required', 'string', 'max:'],
            'nacionalidade' => ['required', 'string', 'max:'],
            'codMatricula' => ['required', 'string', 'max:'],
            'dtNascimento' => ['required', 'string', 'max:'],
            'tituloEleitor' => ['required', 'string', 'max:'],
            'idtCivil'=> ['required', 'string', 'max:'],
            'dtExpedicao' => ['required', 'string', 'max:'],
            'orgExpeditor' => ['required', 'string', 'max:'],
            'nomeMae' => ['required', 'string', 'max:']
        ]);

        if($validador->fails()){
            return redirect()->route('cadastro.create')
                        ->withErrors($validador)
                        ->withInput();
        }



        return redirect()->route('cadastro.index');
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        if($cliente) {
            return view('admin.clientes.dadosCliente', [
                'cliente' => $cliente
            ]);
        }

        return redirect()->route('cadastro.index');
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
