<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;
use App\Models\PessoaFisica;
use App\Models\Contato;
use App\Models\Endereco;
use Illuminate\Support\Facades\DB;

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
            $cliente = new Cliente;
            $cliente->nome = $request->input('nome');
            $cliente->save();

            $cpf = new PessoaFisica;
            $cpf->cpf = $request->input('cpf');
            $cpf->pis = $request->input('pis');
            $cpf->profissao = $request->input('profissao');
            $cpf->sexo = $request->input('sexo');
            $cpf->estadoCivil = $request->input('estadoCivil');
            $cpf->tratamento = $request->input('tratamento');
            $cpf->numCtps = $request->input('numCtps');
            $cpf->serieCtps = $request->input('serieCtps');
            $cpf->nacionalidade = $request->input('nacionalidade');
            $cpf->dtNascimento = $request->input('dtNascimento');
            $cpf->tituloEleitor = $request->input('tituloEleitor');
            $cpf->idtCivil = $request->input('idtCivil');
            $cpf->dtExpedicao = $request->input('dtExpedicao');
            $cpf->orgExpeditor = $request->input('orgExpeditor');
            $cpf->nomeMae = $request->input('nomeMae');
            $cpf->cliente()->associate($cliente);
            $cpf->save();

            $contato = new Contato;
            $contato->email =$request->input('email');
            $contato->telefone =$request->input('telefone');
            $contato->celular =$request->input('celular');
            $contato->cliente()->associate($cliente);
            $contato->save();

            $endereco = new Endereco;
            $endereco->logradouro = $request->input('logradouro');
            $endereco->complemento = $request->input('complemento');
            $endereco->numEndereco = $request->input('numEndereco');
            $endereco->bairro = $request->input('bairro');
            $endereco->cidade = $request->input('cidade');
            $endereco->uf = $request->input('uf');
            $endereco->cep = $request->input('cep');
            $endereco->cliente()->associate($cliente);
            $endereco->save();

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

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        if($cliente) {
            return view('admin.clientes.editar', [
                'cliente' => $cliente
            ]);
        }

        return redirect()->route('cadastro.index');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $cliente = Cliente::all($id);
        $cliente->delete();

        return redirect()->route('cadastro.index');
    }
}
