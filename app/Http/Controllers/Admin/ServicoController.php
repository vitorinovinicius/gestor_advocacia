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
use App\Models\Servico;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = Servico::orderBy('pasta_servico', 'ASC')
                            ->first()
                            ->get();
        return view('admin.servicos.index', [
            'servicos' => $servicos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('admin.servicos.adicionar', [
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servico = Servico::find($id);
        $servico->cliente()->wherePivot('cliente_id', '!=', $id)->detach();

        return redirect()->route('cadastro.index');
    }
}
