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
use App\Models\Servico;
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

        //$profissao_pf   = new ProfissaoPessoaFisica; Pivô entre profissão e pessoa fisica

        $cliente->nome              = $request->input('nome');
        $cliente->nome_empresa      = $request->input('nome_empresa');
        $cliente->save();
        $cliente = Cliente::find($cliente->id);

        if($cliente->nome = $request->input('nome')){

            $pf->cpf                = $request->input('cpf');
            $pf->pis                = $request->input('pis');
            $pf->sexo               = $request->input('sexo');
            $pf->profissao          = $request->input('profissao');
            $pf->estadoCivil        = $request->input('estadoCivil');
            $pf->tratamento         = $request->input('tratamento');
            $pf->numCtps            = $request->input('numCtps');
            $pf->serieCtps          = $request->input('serieCtps');
            $pf->ufCtps             = $request->input('ufCtps');
            $pf->nacionalidade      = $request->input('nacionalidade');
            $pf->dtNascimento       = $request->input('dtNascimento');
            $pf->tituloEleitor      = $request->input('tituloEleitor');
            $pf->idtCivil           = $request->input('idtCivil');
            $pf->dtExpedicao        = $request->input('dtExpedicao');
            $pf->orgExpeditor       = $request->input('orgExpeditor');
            $pf->nomeMae            = $request->input('nomeMae');
            $pf->cliente()->associate($cliente);
            $pf->save();

        }elseif($cliente->nome_empresa = $request->input('nome_empresa')){

            $pj->numero             = $request->input('numero');
            $pj->inscMunicipal      = $request->input('inscMunicipal');
            $pj->inscEstadual       = $request->input('inscEstadual');
            $pj->codigo             = $request->input('codigo');
            $pj->natureza_pj        = $request->input('natureza_pj');
            $pj->cliente()->associate($cliente);
            $pj->save();
        }

        if($cliente->processo->pasta = $request->input('pasta')){

            $processo                   = new Processo;
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
            $processo                   = Processo::find($processo->id);
            $processo->cliente()->sync($cliente);

        }elseif($cliente->servico->pasta_servico = $request->input('pasta_servico')){

            $servico                    = new Servico;
            $servico->pasta_servico     = $request->input('pasta_servico');
            $servico->assunto           = $request->input('assunto');
            $servico->contrato          = $request->input('contrato');
            $servico->negociacao        = $request->input('negociacao');
            $servico->abertura          = $request->input('abertura');
            $servico->situacao          = $request->input('situacao');
            $servico->save();
            $servico->cliente()->sync($cliente);
        }


        $contato->email                 = $request->input('email');
        $contato->telefone              = $request->input('telefone');
        $contato->celular               = $request->input('celular');
        $contato->cliente()->associate($cliente);
        $contato->save();


        $endereco->logradouro           = $request->input('logradouro');
        $endereco->complemento          = $request->input('complemento');
        $endereco->numEndereco          = $request->input('numEndereco');
        $endereco->bairro               = $request->input('bairro');
        $endereco->cidade               = $request->input('cidade');
        $endereco->uf                   = $request->input('uf');
        $endereco->cep                  = $request->input('cep');
        $endereco->cliente()->associate($cliente);
        $endereco->save();

        return redirect()->route('cadastro.show', $cliente->id);
    }

    public function show($id)
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

        $processos = Cliente::find($id)->processo()->paginate(2);
        $servicos = Cliente::find($id)->servico()->paginate(1);
        $cliente = Cliente::find($id);
        if($cliente) {
            return view('admin.clientes.dadosCliente', [
                'cliente'               => $cliente,
                'processos'             => $processos,
                'servicos'              => $servicos,
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

        $cliente = Cliente::find($id);
        if($cliente) {
            return view('admin.clientes.editar', [
                'cliente'               => $cliente,
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

    public function update(Request $request, $id)
    {
        $cliente                                    = Cliente::find($id);
        $pessoa_fisica                              = Cliente::find($id)->pessoaFisica;
        $pessoa_juridica                            = Cliente::find($id)->pessoaJuridica;
        $contatos                                   = Cliente::find($id)->Contato;
        $endereco                                   = Cliente::find($id)->Endereco;

        $cliente->nome                              = $request['nome'];
        $cliente->nome_empresa                      = $request['nome_empresa'];
        $cliente->save();

        if ($cliente->nome = $request['nome']){
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
            $contato->email                         = $request['email'];
            $contato->telefone                      = $request['telefone'];
            $contato->celular                       = $request['celular'];
            $contato->save();
        }

        $endereco->logradouro                       = $request['logradouro'];
        $endereco->complemento                      = $request['complemento'];
        $endereco->numEndereco                      = $request['numEndereco'];
        $endereco->bairro                           = $request['bairro'];
        $endereco->cidade                           = $request['cidade'];
        $endereco->uf                               = $request['uf'];
        $endereco->cep                              = $request['cep'];
        $endereco->save();

            //dd($pessoa_fisica);
        return redirect()->route('cadastro.index');
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if(!empty($cliente->processo)){

            $cliente->processo()->detach();

            if(!empty($cliente->servico)){
                $cliente->servico()->detach();
            }
        }

        $cliente->delete();

        return redirect()->route('cadastro.index');
    }
}
