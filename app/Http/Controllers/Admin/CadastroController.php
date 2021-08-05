<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCadastroRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;
use App\Models\PessoaFisica;
use App\Models\Contato;
use App\Models\Endereco;
use App\Models\PessoaJuridica;
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

    public function store(StoreCadastroRequest $request)
    {
        $cliente = new Cliente;
        $cliente->nome = $request->input('nome');
        $cliente->save();

        $pf = new PessoaFisica;
        $pf->cpf = $request->input('pf');
        $pf->pis = $request->input('pis');
        $pf->profissao = $request->input('profissao');
        $pf->sexo = $request->input('sexo');
        $pf->estadoCivil = $request->input('estadoCivil');
        $pf->tratamento = $request->input('tratamento');
        $pf->numCtps = $request->input('numCtps');
        $pf->serieCtps = $request->input('serieCtps');
        $pf->nacionalidade = $request->input('nacionalidade');
        $pf->dtNascimento = $request->input('dtNascimento');
        $pf->tituloEleitor = $request->input('tituloEleitor');
        $pf->idtCivil = $request->input('idtCivil');
        $pf->dtExpedicao = $request->input('dtExpedicao');
        $pf->orgExpeditor = $request->input('orgExpeditor');
        $pf->nomeMae = $request->input('nomeMae');
        $pf->cliente()->associate($cliente);
        $pf->save();

        $pj = new PessoaJuridica;
        $pj->nome_empresa = $request->input('nome_empresa');
        $pj->numero = $request->input('numero');
        $pj->inscMunicipal = $request->input('inscMunicipal');
        $pj->inscEstadual = $request->input('inscEstadual');
        $pj->codigo = $request->input('codigo');
        $pj->cliente()->associate($cliente);
        $pj->save();

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
