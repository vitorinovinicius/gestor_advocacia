@extends('adminlte::page')

@section('title', 'Editar cliente ')

@section('content_header')
@section('css')
    <link rel="stylesheet" href="{{url('css/app.css')}}">
@endsection
<script type="text/javascript" src="{{url('js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/mask_number.js')}}"></script>

    <h1>
            Editar dados do cliente
        <a href="{{route('cadastro.index')}}" class="btn btn-sm btn-success">
        <i class="fas fa-reply"></i>
            Voltar
        </a>
    </h1>
@endsection

@section('content')
<link rel="stylesheet" href="{{url('css/dados_cliente.css')}}">
    <form action="{{route('cadastro.update', $cliente->id)}}" method="post" class="atualizar_cliente">
        @method('PUT')
        @csrf
        <!-- INÍCIO DA PESSOA NATURAL -->
        @if($cliente->nome > 0)
        <div class="card shadow-lg bg-light rounded cadastro natural">
            <div class="card-header bg-light">
                <strong>PESSOA NATURAL</strong>
            </div>
            <div class="card-body col-12">
                <p class="card-text">
                <div class="row">
                    <div class="form-group col-6">
                        <input type="text" name="nome"  value="{{$cliente->nome}}" class="form-control" maxlength="150" aria-describedby="nome_cliente">
                        <small id="nome_cliente" class="form-text text-muted">Insira o nome completo</small>
                    </div>

                    <div class="form-group col-sm-3">
                        <input type="text" name="cpf" id="cpf" value="
                        @if(isset($cliente->pessoaFisica->cpf)){{$cliente->pessoaFisica->cpf}}
                        @else Não há dados cadastrados.
                        @endif"
                        class="form-control" maxlength="14" aria-describedby="cpf_cliente">
                        <small id="cpf_cliente" class="form-text text-muted">Insira o número do CPF</small>
                    </div>

                    @if(isset($cliente->pessoaFisica->pis) > 0)
                        <div class="form-group col-sm-3">
                            <input type="text" name="pis" id="pis"  value="{{$cliente->pessoaFisica->pis}}" class="form-control" maxlength="14" aria-describedby="pis_cliente">
                            <small id="pis_cliente" class="form-text text-muted">Insira o número do PIS</small>
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text" name="pis" id="pis"  placeholder="PIS não informado." class="form-control" maxlength="14" aria-describedby="pis_cliente">
                            <small id="pis_cliente" class="form-text text-muted">Insira o número do PIS</small>
                        </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->numCtps) > 0)
                        <div class="form-group col-sm-3">
                            <input type="text" name="numCtps" id="numCtps"  value="{{$cliente->pessoaFisica->numCtps}}" class="form-control" maxlength="7" aria-describedby="numCtps_cliente">
                            <small id="numCtps_cliente" class="form-text text-muted">Insira o número da CTPS</small>
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text" name="numCtps" id="numCtps" placeholder="Número da CTPS não informado." class="form-control" maxlength="7" aria-describedby="numCtps_cliente">
                            <small id="numCtps_cliente" class="form-text text-muted">Insira o número da CTPS</small>
                        </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->serieCtps) > 0)
                        <div class="form-group col-sm-2">
                            <input type="text" name="serieCtps" id="serieCtps" value="{{$cliente->pessoaFisica->serieCtps}}" class="form-control" maxlength="5" aria-describedby="serieCtps_cliente">
                            <small id="serieCtps_cliente" class="form-text text-muted">Insira a série da CTPS</small>
                        </div>
                    @else
                        <div class="form-group col-sm-2">
                            <input type="text" name="serieCtps" id="serieCtps" placeholder="Série CTPS não informado." class="form-control" maxlength="5" aria-describedby="serieCtps_cliente">
                            <small id="serieCtps_cliente" class="form-text text-muted">Insira a série da CTPS</small>
                        </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->profissao) > 0)
                        <div class="form-group col-sm-7">
                            <input type="text" name="profissao"  value="{{$cliente->pessoaFisica->profissao}}"class="custom-select" id="profissao" aria-describedby="profissao_cliente">
                            <small id="profissao_cliente" class="form-text text-muted">Selecione ou insira a profissão</small>
                        </div>
                    @else
                        <div class="form-group col-sm-7">
                            <input type="text" name="profissao" placeholder="Não informada."class="custom-select" id="profissao" aria-describedby="profissao_cliente">
                            <small id="profissao_cliente" class="form-text text-muted">Selecione ou insira a profissão</small>
                        </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->tituloEleitor) > 0)
                    <div class="form-group col-sm-3">
                        <input type="text" name="tituloEleitor" id="titulo_eleitor" value="{{$cliente->pessoaFisica->tituloEleitor}}" class="form-control" maxlength="19" aria-describedby="titulo_eleitor_cliente">
                        <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira o número do título de eleitor</small>
                    </div>
                    @else
                    <div class="form-group col-sm-3">
                        <input type="text" name="tituloEleitor" id="titulo_eleitor" placeholder="Não informado." class="form-control" maxlength="19" aria-describedby="titulo_eleitor_cliente">
                        <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira o número do título de eleitor</small>
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->idtCivil) > 0)
                    <div class="form-group col-sm-3">
                        <input type="text" name="idtCivil" id="rg" value="{{$cliente->pessoaFisica->idtCivil}}" class="form-control" maxlength="13" aria-describedby="idtCivil_cliente">
                        <small id="idtCivil_cliente" class="form-text text-muted">Insira o número da Identidade Civil </small>
                    </div>
                    @else
                    <div class="form-group col-sm-3">
                        <input type="text" name="idtCivil" id="rg" placeholder="Número do registro geral não informado." class="form-control" maxlength="13" aria-describedby="idtCivil_cliente">
                        <small id="idtCivil_cliente" class="form-text text-muted">Insira o número da Identidade Civil </small>
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->orgExpeditor) > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="orgExpeditor"  value="{{$cliente->pessoaFisica->orgExpeditor}}"class="custom-select" id="orgExpeditor" aria-describedby="orgExpeditor_cliente">
                        <small id="orgExpeditor_cliente" class="form-text text-muted">Selecione o órgão expeditor</small>
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="orgExpeditor"  placeholder="Orgão não infomado." class="custom-select" id="orgExpeditor" aria-describedby="orgExpeditor_cliente">
                        <small id="orgExpeditor_cliente" class="form-text text-muted">Selecione o órgão expeditor</small>
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->dtExpedicao) > 0)
                    <div class="form-group col-sm-2">
                        <input type="date" name="dtExpedicao"  class="form-control" value="{{$cliente->pessoaFisica->dtExpedicao}}" aria-describedby="orgExpeditor_cliente">
                        <small id="dtExpedicao_cliente" class="form-text text-muted">Insira a data de expedição</small>
                    </div>
                    @else
                    <div class="form-group col-sm-2">
                        <input type="date" name="dtExpedicao"  class="form-control" placeholder="Não informado." aria-describedby="dtExpedicao_cliente">
                        <small id="dtExpedicao_cliente" class="form-text text-muted">Insira a data de expedição</small>
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->sexo) > 0)
                    <div class="form-group col-sm-2">
                        <input type="text" name="sexo"  value="{{$cliente->pessoaFisica->sexo}}"class="custom-select" id="sexo" aria-describedby="sexo_cliente">
                        <small id="sexo_cliente" class="form-text text-muted">Selecione o sexo</small>
                    </div>
                    @else
                    <div class="form-group col-sm-2">
                        <input type="text" name="sexo"  placeholder="Não informado"class="custom-select" id="sexo" aria-describedby="sexo_cliente">
                        <small id="sexo_cliente" class="form-text text-muted">Selecione o sexo</small>
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->estadoCivil) > 0)
                    <div class="form-group col-sm-2">
                        <input type="text" name="estadoCivil"  value="{{$cliente->pessoaFisica->estadoCivil}}"class="custom-select" id="estadoCivil" aria-describedby="estado_civil_cliente">
                        <small id="estado_civil_cliente" class="form-text text-muted">Selecione o estado civil</small>
                    </div>
                    @else
                    <div class="form-group col-sm-2">
                        <input type="text" name="estadoCivil"  placeholder="Não informado."class="custom-select" id="estadoCivil" aria-describedby="estado_civil_cliente">
                        <small id="estado_civil_cliente" class="form-text text-muted">Selecione o estado civil</small>
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->tratamento) > 0)
                    <div class="form-group col-sm-2">
                        <input type="text" name="tratamento" value="{{$cliente->pessoaFisica->tratamento}}"class="custom-select" id="tratamento" aria-describedby="tratamento_cliente">
                        <small id="tratamento_cliente" class="form-text text-muted">Selecione o tratamento</small>
                    </div>
                    @else
                    <div class="form-group col-2">
                        <input type="text" name="tratamento"  placeholder="Não informado."class="custom-select" id="tratamento" aria-describedby="tratamento_cliente">
                        <small id="tratamento_cliente" class="form-text text-muted">Selecione o tratamento</small>
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->nacionalidade) > 0)
                    <div class="form-group col-sm-3">
                        <input type="text" name="nacionalidade"  value="{{$cliente->pessoaFisica->nacionalidade}}" class="custom-select" aria-describedby="nacionalidade_cliente">
                        <small id="nacionalidade_cliente" class="form-text text-muted">Selecione a nacionalidade</small>
                    </div>
                    @else
                    <div class="form-group col-3">
                        <input type="text" name="nacionalidade"  placeholder="Não informado." class="custom-select" aria-describedby="nacionalidade_cliente">
                        <small id="nacionalidade_cliente" class="form-text text-muted">Selecione a nacionalidade</small>
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->dtNascimento) > 0)
                    <div class="form-group col-sm-3">
                        <input type="date" name="dtNascimento" value="{{$cliente->pessoaFisica->dtNascimento}}" class="form-control" aria-describedby="data_nascimento_cliente">
                        <small id="data_nascimento_cliente" class="form-text text-muted">Insira a data de nascimento</small>
                    </div>
                    @else
                    <div class="form-group col-sm-3">
                        <input type="text" name="dtNascimento" class="form-control"  placeholder="Não informado." aria-describedby="data_nascimento_cliente">
                        <small id="data_nascimento_cliente" class="form-text text-muted">Insira a data de nascimento</small>
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->nomeMae) > 0)
                    <div class="form-group col-sm-6">
                        <input type="text" name="nomeMae" value="{{$cliente->pessoaFisica->nomeMae}}" class="form-control" maxlength="150" aria-describedby="nome_mae_cliente">
                        <small id="nome_mae_cliente" class="form-text text-muted">Insira o nome completo da mãe</small>
                    </div>
                    @else
                    <div class="form-group col-sm-6">
                        <input type="text" name="nomeMae" class="form-control"  placeholder="Não informado." aria-describedby="nome_mae_cliente">
                        <small id="nome_mae_cliente" class="form-text text-muted">Insira a data de nascimento</small>
                    </div>
                    @endif
                </div>
            </div>
        </div><!-- FIM DO COLLAPSE PF -->

        @elseif(isset($cliente->nome_empresa) > 0)
        <!-- INÍCIO DO COLLAPSE PJ -->
        <div class="card shadow-lg bg-light rounded cadastro juridica">
            <div class="card-header bg-light">
                <strong>PESSOA JURÍDICA</strong>
            </div>
            <div class="card-body col-12">
                <p class="card-text">
                <div class="row">
                    <div class="form-group col-9">
                        <input type="text" name="nome_empresa"  value="{{$cliente->nome_empresa}}" class="form-control @error('nome_empresa') is-invalid @enderror" aria-describedby="nome_empresa_cliente">
                        <small id="nome_empresa_cliente" class="form-text text-muted">Insira a razão social</small>
                            @error('nome_empresa')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                            @enderror
                    </div>

                    <div class="form-group col-sm-3">
                        <input type="text" name="numero" id="cnpj"  value="{{$cliente->pessoaJuridica->numero}}" class="form-control" maxlength="18" aria-describedby="cnpj_cliente">
                        <small id="cnpj_cliente" class="form-text text-muted">Insira o número do CNPJ</small>
                    </div>

                    @if($cliente->pessoaJuridica->inscMunicipal > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal"  value="{{$cliente->pessoaJuridica->inscMunicipal}}" class="form-control" aria-describedby="inscMunicipal_cliente">
                        <small id="inscMunicipal_cliente" class="form-text text-muted">Insira a inscrição municipal</small>
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal"  placeholder="Inscrição Municipal não informada." class="form-control" aria-describedby="inscMunicipal_cliente">
                        <small id="inscMunicipal_cliente" class="form-text text-muted">Insira a inscrição municipal</small>
                    </div>
                    @endif

                    @if($cliente->pessoaJuridica->insEstadual > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal"  value="{{$cliente->pessoaJuridica->insEstadual}}" class="form-control" aria-describedby="inscEstadual_cliente">
                        <small id="inscEstadual_cliente" class="form-text text-muted">Insira a inscrição estadual</small>
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscEstadual"  placeholder="Inscrição Estadual não informada." class="form-control" aria-describedby="inscEstadual_cliente">
                        <small id="inscEstadual_cliente" class="form-text text-muted">Insira a inscrição municipal</small>
                    </div>
                    @endif

                    @if($cliente->pessoaJuridica->codigo > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="codigo"  value="{{$$cliente->pessoaJuridica->codigo}}" class="form-control" aria-describedby="codInscricao_cliente">
                        <small id="codInscricao_cliente" class="form-text text-muted">Código</small>
                    </div>
                    @else
                    <div class="form-group col-sm-3">
                        <input type="text" name="codigo"  placeholder="Código não informado." class="form-control" aria-describedby="codInscricao_cliente">
                        <small id="codInscricao_cliente" class="form-text text-muted">Código</small>
                    </div>
                    @endif
                    <div class="form-group col-sm-1">
                        <input type="text" name="natureza_pj"  value="{{$cliente->pessoaJuridica->natureza_pj}}" class="form-control" aria-describedby="natureza_cnpj">
                        <small id="natureza_cnpj" class="form-text text-muted">Natureza</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM DO COLLAPSE PJ -->
        @endif
        <!-- INÍCIO DO CARD ENDEREÇO -->
        <div class="card shadow-lg rounded">
            <div class="card-header bg-light">
                <strong>ENDEREÇO</strong>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div class="row">
                    @if(isset($cliente->endereco->cep) > 0)
                        <div class="form-group col-sm-3">
                            <input type="text"  value="{{$cliente->endereco->cep}}" name="cep"  id="cep" class="form-control" maxlength="8" aria-describedby="cep_cliente">
                            <small id="cep_cliente" class="form-text text-muted">Insira o CEP do endereço</small>
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text"  placeholder="CEP não informado" name="cep"  id="cep" class="form-control" maxlength="8" aria-describedby="cep_cliente">
                            <small id="cep_cliente" class="form-text text-muted">Insira o CEP do endereço</small>
                        </div>
                    @endif

                    @if(isset($cliente->endereco->logradouro) > 0)
                        <div class="form-group col-sm-7">
                            <input type="text" value="{{$cliente->endereco->logradouro}}" name="logradouro"  id="rua" class="form-control" maxlength="150" aria-describedby="logradouro_cliente">
                            <small id="logradouro_cliente" class="form-text text-muted">Insira o logradouro do endereço</small>
                        </div>
                    @else
                        <div class="form-group col-sm-7">
                            <input type="text" value="Logradouro não informado." name="logradouro"  id="rua" class="form-control" maxlength="150" aria-describedby="logradouro_cliente">
                            <small id="logradouro_cliente" class="form-text text-muted">Insira o logradouro do endereço</small>
                        </div>
                    @endif

                    @if(isset($cliente->endereco->numEndereco) > 0)
                        <div class="form-group col-2">
                            <input value="{{$cliente->endereco->numEndereco}}" type="text" name="numEndereco"  class="form-control" maxlength="10" aria-describedby="numero_endereco_cliente">
                            <small id="numero_endereco_cliente" class="form-text text-muted">Insira o número do logradouro</small>
                        </div>
                    @else
                        <div class="form-group col-2">
                            <input value="Nº não informado" type="text" name="numEndereco"  class="form-control" maxlength="10" aria-describedby="numero_endereco_cliente">
                            <small id="numero_endereco_cliente" class="form-text text-muted">Insira o número do logradouro</small>
                        </div>
                    @endif

                    @if(isset($cliente->endereco->complemento) > 0)
                        <div class="form-group col-5">
                            <input value="{{$cliente->endereco->complemento}}"  type="text" name="complemento"  class="form-control" maxlength="50" aria-describedby="complemento_endereco_cliente">
                            <small id="complemento_endereco_cliente" class="form-text text-muted">Insira o complemento exemplo: Andar;Apartamento;Bloco;Sobreloja</small>
                        </div>
                    @else
                        <div class="form-group col-5">
                            <input value="Complemento não informado."  type="text" name="complemento"  class="form-control" maxlength="50" aria-describedby="complemento_endereco_cliente">
                            <small id="complemento_endereco_cliente" class="form-text text-muted">Insira o complemento do endereço. Exemplo: Andar;Apartamento;Bloco;Sobreloja</small>
                        </div>
                    @endif

                    @if(isset($cliente->endereco->bairro) > 0)
                        <div class="form-group col-sm-3">
                            <input type="text" value="{{$cliente->endereco->bairro}}" name="bairro" id="bairro"  class="form-control" maxlength="60" aria-describedby="bairro_cliente">
                            <small id="bairro_cliente" class="form-text text-muted">Insira o bairro</small>
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text" value="Bairro não informado." name="bairro" id="bairro"  class="form-control" maxlength="60" aria-describedby="bairro_cliente">
                            <small id="bairro_cliente" class="form-text text-muted">Insira o bairro</small>
                        </div>
                    @endif

                    @if(isset($cliente->endereco->cidade) > 0)
                        <div class="form-group col-sm-3">
                            <input type="text" value="{{$cliente->endereco->cidade}}" name="cidade" id="cidade"  class="form-control" maxlength="60" aria-describedby="cidade_cliente">
                            <small id="cidade_cliente" class="form-text text-muted">Insira o cidade</small>
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text" value="Cidade não informada." name="cidade" id="cidade"  class="form-control" maxlength="60" aria-describedby="cidade_cliente">
                            <small id="cidade_cliente" class="form-text text-muted">Insira o cidade</small>
                        </div>
                    @endif

                    @if(isset($cliente->endereco->uf) > 0)
                        <div class="form-group col-sm-1">
                            <input type="text" value="{{$cliente->endereco->uf}}" name="uf" id="uf"  class="form-control" maxlength="2" aria-describedby="uf_cliente">
                            <small id="uf_cliente" class="form-text text-muted">UF</small>
                        </div>
                    @else
                        <div class="form-group col-sm-2">
                            <input type="text" value="UF não informada." name="uf" id="uf"  class="form-control" maxlength="2" aria-describedby="uf_cliente">
                            <small id="uf_cliente" class="form-text text-muted">UF</small>
                        </div>
                    @endif
                    </div>
                </p>
            </div>
        <!-- FIM DO CARD ENDEREÇO -->

        <!-- INÍCIO DO CARD CONTATO -->
            <div class="card-header bg-light">
                <strong>CONTATO</strong>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div class="row">
                        @foreach($cliente->contato as $contato)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$contato->email}}" name="email"  class="form-control" maxlength="100" aria-describedby="email_cliente">
                            <small id="email_cliente" class="form-text text-muted">Insira o e-mail - exemplo: seuemail@exemplo.com</small>
                        </div>

                        @if(isset($contato->telefone) > 0)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$contato->telefone}}" name="telefone"  class="form-control" maxlength="13" aria-describedby="telefone_cliente">
                            <small id="telefone_cliente" class="form-text text-muted">Insira o telefone - exemplo: (99) 9999-9999</small>
                        </div>
                        @else
                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Telefone não informado." name="telefone"  class="form-control" maxlength="13" aria-describedby="telefone_cliente">
                            <small id="telefone_cliente" class="form-text text-muted">Insira o telefone - exemplo: (99) 9999-9999</small>
                        </div>
                        @endif

                        @if(isset($contato->celular) > 0)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$contato->celular}}" name="celular"  class="form-control" maxlength="14" aria-describedby="celular_cliente">
                            <small id="telefone_cliente" class="form-text text-muted">Insira o celular - exemplo: (99) 99999-9999</small>
                        </div>
                        @else
                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Celular não informado." name="celular"  class="form-control" maxlength="14" aria-describedby="celular_cliente">
                            <small id="telefone_cliente" class="form-text text-muted">Insira o celular - exemplo: (99) 99999-9999</small>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </p>
            </div>
        <!-- FIM DO CARD CONTATO -->
                <div class="card-header bg-light">
                    <strong>VINCULAR</strong>
                </div>
                <div class="card-body">
                <ul class="nav nav-tabs col-md-12" role="tablist">
                    <li role="presentation" class="nav-item" >
                        <a class="nav-link active" href="#processo_todos" aria-controls="processo_todos" data-toggle="tab" role="tab">Processo</a>
                    </li>

                    <li role="presentation" class="nav-item" >
                        <a class="nav-link" href="#servico_todos" aria-controls="servico_todos" data-toggle="tab" role="tab">Serviço</a>
                    </li>
                </ul>
                <div class="tab-content col-md-12 table-responsive-sm">
                    <div role="tabpanel" class="tab-pane nav-link active" id="processo_todos">
                        @if(count($processos_todos) > 0)
                        <table class="table table-hover" id="processos">
                            <thead>
                                <tr>
                                    <th class="col-6">Pasta do processo</th>
                                    <th class="col-3">Data de distribuição</th>
                                    <th class="col-2">Andamento</th>
                                    <th class="col">Vincular</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($processos_todos as $processo_cliente)
                                <tr>
                                    <td>
                                        {{$processo_cliente->pasta}}
                                    </td>
                                    <td>
                                        @if($processo_cliente->dtDistribuicao)
                                        {{date('d/m/Y', strtotime($processo_cliente->dtDistribuicao))}}
                                        @else
                                            Em análise.
                                        @endif
                                    </td>
                                    <td>
                                        @if($processo_cliente->ultAndamento)
                                        {{date('d/m/Y', strtotime($processo_cliente->ultAndamento))}}
                                        @else
                                            Não há andamento.
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-check" align="center">
                                            <input class="form-check-input" name="processo[]" type="checkbox" value="{{$processo_cliente->id}}">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table><br>
                        @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-6">Pasta do processo</th>
                                    <th class="col-3">Data de distribuição</th>
                                    <th class="col-2">Andamento</th>
                                    <th class="col">Vincular</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> Não há dados. </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>

                    <div role="tabpanel" class="tab-pane nav-link" id="servico_todos">
                        @if(count($servicos_todos) > 0)
                        <table class="table table-hover" id="servicos">
                            <thead>
                                <tr>
                                    <th>Pasta do serviço</th>
                                    <th>Contrato</th>
                                    <th>Data de abertura</th>
                                    <th>Situação</th>
                                    <th>Vincular</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($servicos_todos as $servico_cliente)
                                <tr>
                                    <td>
                                        {{$servico_cliente->pasta_servico}}
                                    </td>
                                    <td>{{$servico_cliente->contrato}}</td>
                                    <td>
                                        @php
                                        $data_abertura = new DateTime($servico_cliente->abertura);
                                        echo $data_abertura->format('d/m/Y');
                                        @endphp
                                    </td>
                                    <td>{{$servico_cliente->situacao}}</td>
                                    <td>
                                        <div class="form-check" align="center">
                                            <input class="form-check-input" name="servico[]" type="checkbox" value="{{$servico_cliente->id}}">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <table class="table table">
                            <thead>
                                <tr>
                                    <th class="col-5">Pasta do serviço</th>
                                    <th class="col-2">Contrato</th>
                                    <th class="col-2">Data de abertura</th>
                                    <th class="col-2">Situação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> Não há dados. </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div><br>
                <div class="form-group"> <!-- BOTÃO SUBMIT DO FORM -->
                    <div class="col-sm-12" align="right">
                        <input type="submit" class="btn btn-success" value="Atualizar">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="col-12">
        <div class="row">
            <div class="card-header bg-light col-md-12">
                <strong>VINCULADOS</strong>
            </div>
            <div class="card col-md-12" role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="nav-item" >
                        <a class="nav-link active" href="#processo" aria-controls="processo" data-toggle="tab" role="tab">Processo</a>
                    </li>

                    <li role="presentation" class="nav-item" >
                        <a class="nav-link" href="#servico" aria-controls="servico" data-toggle="tab" role="tab">Serviço</a>
                    </li>
                </ul>
                <div class="tab-content col-md-12">
                    <div role="tabpanel" class="tab-pane nav-link active tabela" id="processo">
                        @if(count($cliente->processo) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-6">Pasta do processo</th>
                                    <th class="col-2">Data de distribuição</th>
                                    <th class="col-3">Andamento</th>
                                    <th class="col">Desvincular</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($processos as $processo)
                                <tr>
                                    <td>
                                        <a href="{{route('processo.show', $processo->id)}}">
                                            {{$processo->pasta}}
                                        </a>
                                    </td>
                                    <td>
                                        {{date('d/m/Y', strtotime($processo->dtDistribuicao))}}
                                    </td>
                                    <td>
                                        @if($processo->ultAndamento)
                                        {{date('d/m/Y', strtotime($processo->ultAndamento))}}
                                        @else
                                            Não há andamento.
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('processo.destroy', $processo->id)}}" method="POST" class="desvincular_processo">
                                            @method('delete')
                                            @csrf
                                            <div class="form-group"> <!-- BOTÃO SUBMIT DO FORM -->
                                                <div>
                                                    <input type="submit" class="btn btn-sm btn-danger" value="Desvincular">
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table><br>
                        @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-6">Pasta do processo</th>
                                    <th class="col-3">Data de distribuição</th>
                                    <th class="col-3">Andamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> Não há dados. </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>

                    <div role="tabpanel" class="tab-pane nav-link tabela" id="servico">
                        @if(count($servicos) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Pasta do serviço</th>
                                    <th>Contrato</th>
                                    <th>Data de abertura</th>
                                    <th>Situação</th>
                                    <th>Desvincular</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($servicos as $servico)
                                <tr>
                                    <td>
                                        <a href="{{route('servico.show', $servico->id)}}">
                                            {{$servico->pasta_servico}}
                                        </a>
                                    </td>
                                    <td>{{$servico->contrato}}</td>
                                    <td>
                                        @php
                                        $data_abertura = new DateTime($servico->abertura);
                                        echo $data_abertura->format('d/m/Y');
                                        @endphp
                                    </td>
                                    <td>{{$servico->situacao}}</td>
                                    <td>
                                        <form action="{{route('servico.destroy', $servico->id)}}" method="POST" class="desvincular_servico">
                                            @method('delete')
                                            @csrf
                                            <div class="form-group"> <!-- BOTÃO SUBMIT DO FORM -->
                                                <div>
                                                    <input type="submit" class="btn btn-sm btn-danger" value="Desvincular">
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $servicos->links() }}
                        </div>
                        @else
                        <table class="table table">
                            <thead>
                                <tr>
                                    <th class="col-5">Pasta do serviço</th>
                                    <th class="col-2">Contrato</th>
                                    <th class="col-2">Data de abertura</th>
                                    <th class="col-2">Situação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> Não há dados. </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{url('js/botao_pf_pj.js')}}"></script>
    <script src="{{url('js/viacep_cliente.js')}}"></script>
    <script src="{{url('js/viacep_parte_contraria.js')}}"></script>
    <script src="{{url('js/desvincular_processo.js')}}"></script>
    <script src="{{url('js/desvincular_servico.js')}}"></script>
    <script src="{{url('js/atualizar_cliente.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#processos').DataTable({
                responsive: true,
                info: false,
                fixedHeader: true
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#servicos').DataTable({
                responsive: true,
                info: false,
                fixedHeader: true
            });
        });
    </script>
@endsection


