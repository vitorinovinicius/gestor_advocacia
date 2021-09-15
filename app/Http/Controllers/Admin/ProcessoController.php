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
        $processos = Processo::orderBy('pasta', 'ASC')
                            ->first()
                            ->get();
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
        $clientes = Cliente::all()->first();
        $parte_contrarias = ParteContraria::all();

        return view('admin.processos.adicionar', [
            'clientes'          => $clientes,
            'parte_contrarias'  => $parte_contrarias
        ]);
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

        $processo->pasta            = $request->input('pasta');
        $processo->instInicial      = $request->input('instInicial');
        $processo->numInicial       = $request->input('numInicial');
        $processo->numPrincipal     = $request->input('numPrincipal');
        $processo->numProcesso      = $request->input('numProcesso');
        $processo->dtDistribuicao   = $request->input('dtDistribuicao');
        $processo->acao             = $request->input('acao');
        $processo->fase             = $request->input('fase');
        $processo->natureza         = $request->input('natureza');
        $processo->rito             = $request->input('rito');
        $processo->parte_contraria  = $request->input('parte_contraria');
        $processo->advContrario     = $request->input('advContrario');
        $processo->orgao_inicial    = $request->input('orgao_inicial');
        $processo->titulo           = $request->input('titulo');
        $processo->save();

        return redirect()->route('processo.edit', $processo->id);
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

        $processo = Processo::find($id);
            return view('admin.processos.editar', [
                'processo' => $processo
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
        $processo                   = Processo::find($id);

        $processo->pasta            = $request['pasta'];
        $processo->instInicial      = $request['instInicial'];
        $processo->numInicial       = $request['numInicial'];
        $processo->numPrincipal     = $request['numPrincipal'];
        $processo->numProcesso      = $request['numProcesso'];
        $processo->dtDistribuicao   = $request['dtDistribuicao'];
        $processo->acao             = $request['acao'];
        $processo->fase             = $request['fase'];
        $processo->natureza         = $request['natureza'];
        $processo->rito             = $request['rito'];
        $processo->parte_contraria  = $request['parte_contraria'];
        $processo->advContrario     = $request['advContrario'];
        $processo->orgao_inicial    = $request['orgao_inicial'];
        $processo->titulo           = $request['titulo'];
        $processo->save();

        return redirect()->route('processo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $processo   = Processo::find($id);
        $processo->cliente()->wherePivot('cliente_id', '!=', $id)->detach();

        return redirect()->route('cadastro.index');
    }
}
