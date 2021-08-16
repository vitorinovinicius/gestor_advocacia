<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCadastroRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;
use App\Models\PessoaFisica;
use App\Models\ProfissaoPessoaFisica;
use App\Models\Profissao;
use App\Models\Tratamento;
use App\Models\Nacionalidade;
use App\Models\EstadoCivil;
use App\Models\OrgaoExpeditor;
use App\Models\PessoaJuridica;
use App\Models\NaturezaJuridica;
use App\Models\Contato;
use App\Models\Endereco;
use App\Models\Estado;
use App\Models\Cidade;
use App\Models\Processo;
use App\Models\ClienteProcesso;
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
        $profissoes                 = Profissao::all()->sortBy('tipo');
        $tratamentos                = Tratamento::all();
        $nacionalidades             = Nacionalidade::all();
        $estadoscivis               = EstadoCivil::all();
        $sexos                      = PessoaFisica::all();
        $orgexpeditores             = OrgaoExpeditor::all();

        $naturezas_juridicas        = NaturezaJuridica::all();

        $estados                    = Estado::all();
        $cidades                    = Cidade::all();
        return view('admin.clientes.adicionar', [
            'profissoes'            => $profissoes,
            'tratamentos'           => $tratamentos,
            'nacionalidades'        => $nacionalidades,
            'estadoscivis'          => $estadoscivis,
            'sexos'                 => $sexos,
            'orgexpeditores'        => $orgexpeditores,
            'estados'               => $estados,
            'cidades'               => $cidades,
            'naturezas_juridicas'   => $naturezas_juridicas

        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $cliente                = new Cliente;
        $pf                     = new PessoaFisica;
        $pj                     = new PessoaJuridica;
        $contato                = new Contato;
        $endereco               = new Endereco;
        $processo               = new Processo;
        $cliente_processo       = new ClienteProcesso;
        //$profissao_pf   = new ProfissaoPessoaFisica; Pivô entre profissão e pessoa fisica

        $cliente->nome              = $request->input('nome');
        $cliente->nome_empresa      = $request->input('nome_empresa');
        $cliente->save();

        if ($cliente->nome = $request->input('nome')){

        $pf->cpf            = $request->input('cpf');
        $pf->pis            = $request->input('pis');
        $pf->sexo           = $request->input('sexo');
        $pf->profissao      = $request->input('profissao');
        $pf->estadoCivil    = $request->input('estadoCivil');
        $pf->tratamento     = $request->input('tratamento');
        $pf->numCtps        = $request->input('numCtps');
        $pf->serieCtps      = $request->input('serieCtps');
        $pf->nacionalidade  = $request->input('nacionalidade');
        $pf->dtNascimento   = $request->input('dtNascimento');
        $pf->tituloEleitor  = $request->input('tituloEleitor');
        $pf->idtCivil       = $request->input('idtCivil');
        $pf->dtExpedicao    = $request->input('dtExpedicao');
        $pf->orgExpeditor   = $request->input('orgExpeditor');
        $pf->nomeMae        = $request->input('nomeMae');
        $pf->cliente()->associate($cliente);
        $pf->save();

        }elseif($cliente->nome_empresa = $request->input('nome_empresa')){

        $pj->numero             = $request->input('numero');
        $pj->inscMunicipal      = $request->input('inscMunicipal');
        $pj->inscEstadual       = $request->input('inscEstadual');
        $pj->codigo             = $request->input('codigo');
        $pj->cliente()->associate($cliente);
        $pj->save();
    }


        $contato->email         = $request->input('email');
        $contato->telefone      = $request->input('telefone');
        $contato->celular       = $request->input('celular');
        $contato->cliente()->associate($cliente);
        $contato->save();


        $endereco->logradouro   = $request->input('logradouro');
        $endereco->complemento  = $request->input('complemento');
        $endereco->numEndereco  = $request->input('numEndereco');
        $endereco->bairro       = $request->input('bairro');
        $endereco->cidade       = $request->input('cidade');
        $endereco->uf           = $request->input('uf');
        $endereco->cep          = $request->input('cep');
        $endereco->cliente()->associate($cliente);
        $endereco->save();


        $processo->pasta        = $request->input('pasta');
        $processo->ultAndamento = $request->input('ultAndamento');
        $processo->advContrario = $request->input('advContrario');
        $processo->titulo       = $request->input('titulo');
        $processo->save();

        /*$cliente_processo->processo_id->processo()->associate($processo);
        $cliente_processo->cliente_id->cliente()->associate($cliente);
        $cliente_processo->save();*/

        return redirect()->route('cadastro.index');
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        if($cliente) {
            return view('admin.clientes.index', [
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
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect()->route('cadastro.index');
    }
}
