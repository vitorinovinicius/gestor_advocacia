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
        $cliente                = new PessoaFisica;
        $cliente                = new PessoaJuridica;
        $cliente                = new Contato;
        $cliente                = new Endereco;
        $processo               = new Processo;
        $cliente_processo       = new ClienteProcesso;
        //$profissao_pf   = new ProfissaoPessoaFisica; Pivô entre profissão e pessoa fisica

        $cliente->nome              = $request->input('nome');
        $cliente->nome_empresa      = $request->input('nome_empresa');
        $cliente->save();

        if ($cliente->nome = $request->input('nome')){

        $cliente->cpf            = $request->input('cpf');
        $cliente->pis            = $request->input('pis');
        $cliente->sexo           = $request->input('sexo');
        $cliente->profissao      = $request->input('profissao');
        $cliente->estadoCivil    = $request->input('estadoCivil');
        $cliente->tratamento     = $request->input('tratamento');
        $cliente->numCtps        = $request->input('numCtps');
        $cliente->serieCtps      = $request->input('serieCtps');
        $cliente->ufCtps         = $request->input('ufCtps');
        $cliente->nacionalidade  = $request->input('nacionalidade');
        $cliente->dtNascimento   = $request->input('dtNascimento');
        $cliente->tituloEleitor  = $request->input('tituloEleitor');
        $cliente->idtCivil       = $request->input('idtCivil');
        $cliente->dtExpedicao    = $request->input('dtExpedicao');
        $cliente->orgExpeditor   = $request->input('orgExpeditor');
        $cliente->nomeMae        = $request->input('nomeMae');
        $cliente->cliente()->associate($cliente);
        $cliente->save();

        }elseif($cliente->nome_empresa = $request->input('nome_empresa')){

        $cliente->numero             = $request->input('numero');
        $cliente->inscMunicipal      = $request->input('inscMunicipal');
        $cliente->inscEstadual       = $request->input('inscEstadual');
        $cliente->codigo             = $request->input('codigo');
        $cliente->natureza_pj        = $request->input('natureza_pj');
        $cliente->cliente()->associate($cliente);
        $cliente->save();
    }


        $cliente->email         = $request->input('email');
        $cliente->telefone      = $request->input('telefone');
        $cliente->celular       = $request->input('celular');
        $cliente->cliente()->associate($cliente);
        $cliente->save();


        $cliente->logradouro   = $request->input('logradouro');
        $cliente->complemento  = $request->input('complemento');
        $cliente->numEndereco  = $request->input('numEndereco');
        $cliente->bairro       = $request->input('bairro');
        $cliente->cidade       = $request->input('cidade');
        $cliente->uf           = $request->input('uf');
        $cliente->cep          = $request->input('cep');
        $cliente->cliente()->associate($cliente);
        $cliente->save();


        /*$processo->pasta        = $request->input('pasta');
        $processo->ultAndamento = $request->input('ultAndamento');
        $processo->advContrario = $request->input('advContrario');
        $processo->titulo       = $request->input('titulo');
        $processo->save();

        $cliente_processo->processo_id->processo()->associate($processo);
        $cliente_processo->cliente_id->cliente()->associate($cliente);
        $cliente_processo->save();*/

        return redirect()->route('cadastro.index');
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

        $cliente = Cliente::find($id);
        if($cliente) {
            return view('admin.clientes.dadosCliente', [
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
        $cliente                = Cliente::find($id);
        $pessoa_fisica          = Cliente::find($id)->pessoaFisica;
        $pessoa_juridica        = Cliente::find($id)->pessoaJuridica;
        $contatos               = Cliente::find($id)->Contato;
        $endereco               = Cliente::find($id)->Endereco;

        $cliente->nome          = $request['nome'];
        $cliente->nome_empresa  = $request['nome_empresa'];
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


        /*if(!empty($cliente->nome) > 0) {
            $cliente->nome                          = $request['nome'];
            $cliente->pessoaFisica->cpf             = $request['cpf'];

            dd($cliente);

        }else{
            $cliente->nome_empresa                  = $request['nome_empresa'];
            $cliente->pessoaJuridica->numero        = $request['numero'];
        }

        $cliente->save();

        //dd($cliente);

        return redirect()->route('cadastro.index');



        /*$cliente->pessoaFisica->update([
            'cpf',
            'pis',
            'profissao',
            'estadoCivil',
            'tratamento',
            'numCtps',
            'serieCtps',
            'ufCtps',
            'nacionalidade',
            'dtNascimento',
            'tituloEleitor',
            'idtCivil',
            'dtExpedicao',
            'nomeMae'
        ]);

        $cliente->pessoaJuridica->numero             = $request->input('numero');
        $cliente->pessoaJuridica->inscMunicipal      = $request->input('inscMunicipal');
        $cliente->pessoaJuridica->inscEstadual       = $request->input('inscEstadual');
        $cliente->pessoaJuridica->codigo             = $request->input('codigo');
        $cliente->pessoaJuridica->natureza_pj        = $request->input('natureza_pj');


        $cliente->contato->email         = $request->input('email');
        $cliente->contato->telefone      = $request->input('telefone');
        $cliente->contato->celular       = $request->input('celular');


        $cliente->endereco->logradouro   = $request->input('logradouro');
        $cliente->endereco->complemento  = $request->input('complemento');
        $cliente->endereco->numEndereco  = $request->input('numEndereco');
        $cliente->endereco->bairro       = $request->input('bairro');
        $cliente->endereco->cidade       = $request->input('cidade');
        $cliente->endereco->uf           = $request->input('uf');
        $cliente->endereco->cep          = $request->input('cep');

        $cliente->save();

        return redirect()->route('cadastro.index');


        Cliente::findOrFail($id)->update($request->all());
        if(isset($id->pessoaFisica) > 0){
            PessoaFisica::findOrFail($id)->update($request->all());
        }else{
            PessoaJuridica::findOrFail($id)->update($request->all());
        }
        Contato::findOrFail($id)->update($request->all());
        Endereco::findOrFail($id)->update($request->all());*/

        /*$cliente = Cliente::find($id);
        if($cliente) {
            $data = $request->only([
                'nome'
            ]);

            $validador = Validator::make([
                'nome' => $data['nome']
            ], [
                'nome' => ['required', 'string', 'max:100']
            ]);

            $cliente->nome = $data['nome'];

            if($cliente->Contato->email != $data['email']) {
                $hasEmail = Contato::where('email', $data['email'])->get();

                if(count($hasEmail) === 0) {
                    $cliente->Contato->email = $data['email'];
                } else {
                    $validador->errors()->add('email', __('validation.unique', [
                        'attribute' => 'email'
                    ]));
                }
            }

            if(count($validador->errors()) > 0) {
                return redirect()->route('cadastro.edit', [
                    'cliente' => $id
                ])->withErrors($validador);
            }

            $cliente->save();

        }

        return redirect()->route('usuarios.index');*/
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect()->route('cadastro.index');
    }
}
