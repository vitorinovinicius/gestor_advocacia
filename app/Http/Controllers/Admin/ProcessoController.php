<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
use App\Models\ParteContraria;

class ProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processos = Processo::paginate(10);
        return view('admin.processos.index', [
            'processos' => $processos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.processos.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $processo               = new Processo;
        $parte_contraria        = new ParteContraria;
        $pf                     = new PessoaFisica;
        $pj                     = new PessoaJuridica;
        //$contato                = new Contato;
        $endereco               = new Endereco;

        $parte_contraria->nome              = $request->input('nome');
        $parte_contraria->save();

        /*if ($parte_contraria->nome = $request->input('nome')){

        $pf->cpf            = $request->input('cpf');
        $pf->pis            = $request->input('pis');
        $pf->sexo           = $request->input('sexo');
        $pf->profissao      = $request->input('profissao');
        $pf->estadoCivil    = $request->input('estadoCivil');
        $pf->tratamento     = $request->input('tratamento');
        $pf->numCtps        = $request->input('numCtps');
        $pf->serieCtps      = $request->input('serieCtps');
        $pf->ufCtps         = $request->input('ufCtps');
        $pf->nacionalidade  = $request->input('nacionalidade');
        $pf->dtNascimento   = $request->input('dtNascimento');
        $pf->tituloEleitor  = $request->input('tituloEleitor');
        $pf->idtCivil       = $request->input('idtCivil');
        $pf->dtExpedicao    = $request->input('dtExpedicao');
        $pf->orgExpeditor   = $request->input('orgExpeditor');
        $pf->nomeMae        = $request->input('nomeMae');
        $pf->parteContraria()->associate($parte_contraria);
        $pf->save();

        }elseif($parte_contraria->nome_empresa = $request->input('nome_empresa')){

        $pj->numero             = $request->input('numero');
        $pj->inscMunicipal      = $request->input('inscMunicipal');
        $pj->inscEstadual       = $request->input('inscEstadual');
        $pj->codigo             = $request->input('codigo');
        $pj->natureza_pj        = $request->input('natureza_pj');
        $pj->parteContraria()->associate($parte_contraria);
        $pj->save();
    }*/
        $processo->pasta            = $request->input('pasta');
        $processo->numInicial       = $request->input('numInicial');
        $processo->numPrincipal     = $request->input('numPrincipal');
        $processo->numProcesso      = $request->input('numProcesso');
        $processo->ultAndamento     = $request->input('ultAndamento');
        $processo->compromisso      = $request->input('compromisso');
        $processo->instInicial      = $request->input('instInicial');
        $processo->dtDistribuicao   = $request->input('dtDistribuicao');
        $processo->advContrario     = $request->input('advContrario');
        $processo->titulo           = $request->input('titulo');
        $processo->save();

        /*$contato->email         = $request->input('email');
        $contato->telefone      = $request->input('telefone');
        $contato->celular       = $request->input('celular');
        $contato->parteContraria()->associate($parte_contraria);
        $contato->save();*/


        $endereco->logradouro   = $request->input('logradouro');
        $endereco->complemento  = $request->input('complemento');
        $endereco->numEndereco  = $request->input('numEndereco');
        $endereco->bairro       = $request->input('bairro');
        $endereco->cidade       = $request->input('cidade');
        $endereco->uf           = $request->input('uf');
        $endereco->cep          = $request->input('cep');
        $endereco->parteContraria()->associate($parte_contraria);
        $endereco->save();


        return redirect()->route('processo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $processo = Processo::find($id);
        if($processo) {
            return view('admin.clientes.parteContraria', [
                'processo' => $processo
            ]);
        }

        return redirect()->route('processo.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $cliente->processo()->sync($id);

        $processo = Processo::find($id);
        $processo->cliente()->sync($id);
            return view('admin.processos.editar', [
                'processo' => $processo,
                'cliente' => $cliente
            ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->processo()->sync($id);

        $processo = Processo::findOrFail($id);
        $processo->cliente()->sync($id);

        return redirect()->route('Processo.index')->with('success', 'Processo vínculado ao'.$cliente->nome || $cliente->nome_empresa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Processo::find($id);
        $cliente->delete();

        return redirect()->route('processo.index');
    }

    public function vincula_cliente($id)
    {
        $cliente = Cliente::find($id);
        $cliente->processo()->sync($id);
        $processo =Processo::findOrFail($id);

    }
}
