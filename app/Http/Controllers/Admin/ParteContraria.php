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

class ParteContraria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return view('admin.clientes.parteContraria', [
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
        $parte_contraria        = new ParteContraria;
        $pf                     = new PessoaFisica;
        $pj                     = new PessoaJuridica;
        $contato                = new Contato;
        $endereco               = new Endereco;

        $parte_contraria->nome              = $request->input('nome');
        $parte_contraria->nome_empresa      = $request->input('nome_empresa');
        $parte_contraria->save();

        if ($parte_contraria->nome = $request->input('nome')){

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
    }


        $contato->email         = $request->input('email');
        $contato->telefone      = $request->input('telefone');
        $contato->celular       = $request->input('celular');
        $contato->parteContraria()->associate($parte_contraria);
        $contato->save();


        $endereco->logradouro   = $request->input('logradouro');
        $endereco->complemento  = $request->input('complemento');
        $endereco->numEndereco  = $request->input('numEndereco');
        $endereco->bairro       = $request->input('bairro');
        $endereco->cidade       = $request->input('cidade');
        $endereco->uf           = $request->input('uf');
        $endereco->cep          = $request->input('cep');
        $endereco->parteContraria()->associate($parte_contraria);
        $endereco->save();

        return redirect()->route('cadastro.index');
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
        $profissoes                 = Profissao::all()->sortBy('tipo');
        $tratamentos                = Tratamento::all();
        $nacionalidades             = Nacionalidade::all();
        $estadoscivis               = EstadoCivil::all();
        $sexos                      = PessoaFisica::all();
        $orgexpeditores             = OrgaoExpeditor::all();

        $naturezas_juridicas        = NaturezaJuridica::all();

        $estados                    = Estado::all();
        $cidades                    = Cidade::all();

        $parte_contraria = ParteContraria::find($id);
        if($parte_contraria) {
            return view('admin.clientes.editar', [
                'parte_contraria'       => $parte_contraria,
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

        return redirect()->route('cadastro.index');
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
        $parte_contraria        = ParteContraria::find($id);
        $pessoa_fisica          = ParteContraria::find($id)->pessoaFisica;
        $pessoa_juridica        = ParteContraria::find($id)->pessoaJuridica;
        $contatos               = ParteContraria::find($id)->Contato;
        $endereco               = ParteContraria::find($id)->Endereco;

        $parte_contraria->nome          = $request['nome'];
        $parte_contraria->nome_empresa  = $request['nome_empresa'];
        $parte_contraria->save();

        if ($parte_contraria->nome = $request['nome']){
            $pessoa_fisica->cpf                     = $request['cpf'];
            $pessoa_fisica->pis                     = $request['pis'];
            $pessoa_fisica->sexo                    = $request['sexo'];
            $pessoa_fisica->profissao               = $request['profissao'];
            $pessoa_fisica->estadoCivil             = $request['estadoCivil'];
            $pessoa_fisica->tratamento              = $request['tratamento'];
            $pessoa_fisica->numCtps                 = $request['numCtps'];
            $pessoa_fisica->serieCtps               = $request['serieCtps'];
            $pessoa_fisica->ufCtps                  = $request['ufCtps'];
            $pessoa_fisica->nacionalidade           = $request['nacionalidade'];
            $pessoa_fisica->dtNascimento            = $request['dtNascimento'];
            $pessoa_fisica->tituloEleitor           = $request['tituloEleitor'];
            $pessoa_fisica->idtCivil                = $request['idtCivil'];
            $pessoa_fisica->dtExpedicao             = $request['dtExpedicao'];
            $pessoa_fisica->orgExpeditor            = $request['orgExpeditor'];
            $pessoa_fisica->nomeMae                 = $request['nomeMae'];
            $pessoa_fisica->save();
        }else{
            $pessoa_juridica->numero                = $request['numero'];
            $pessoa_juridica->inscMunicipal         = $request['inscMunicipal'];
            $pessoa_juridica->inscEstadual          = $request['inscEstadual'];
            $pessoa_juridica->codigo                = $request['codigo'];
            $pessoa_juridica->natureza_pj           = $request['natureza_pj'];
            $pessoa_juridica->save();
        }

        foreach($contatos as $contato){
            $contato->email         = $request['email'];
            $contato->telefone      = $request['telefone'];
            $contato->celular       = $request['celular'];
            $contato->save();
        }

        $endereco->logradouro   = $request['logradouro'];
        $endereco->complemento  = $request['complemento'];
        $endereco->numEndereco  = $request['numEndereco'];
        $endereco->bairro       = $request['bairro'];
        $endereco->cidade       = $request['cidade'];
        $endereco->uf           = $request['uf'];
        $endereco->cep          = $request['cep'];
        $endereco->save();

            //dd($pessoa_fisica);
        return redirect()->route('cadastro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = ParteContraria::find($id);
        $cliente->delete();

        return redirect()->route('cadastro.index');
    }
}
