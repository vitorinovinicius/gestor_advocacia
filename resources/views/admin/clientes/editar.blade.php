@extends('adminlte::page')

@section('title', 'Editar cliente ')

@section('content_header')
<link rel="stylesheet" href="{{url('css/app.css')}}">
<script type="text/javascript" src="{{url('js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/mask_number.js')}}"></script>
<script src="{{url('js/mascara_cadastro.js')}}"></script>
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
    <form action="{{route('cadastro.update', $cliente->id)}}" method="post">
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
                        <input type="text" name="nome"  value="{{$cliente->nome}}" class="form-control" maxlength="150">
                    </div>
                    <div class="form-group col-sm-3">
                        <input type="text" name="cpf"  value="@if(isset($cliente->pessoaFisica->cpf)){{$cliente->pessoaFisica->cpf}}@else Não há dados cadastrados. @endif" class="form-control" maxlength="14">
                    </div>

                    @if(isset($cliente->pessoaFisica->pis) > 0)
                        <div class="form-group col-sm-3">
                            <input type="text" name="pis"  value="{{$cliente->pessoaFisica->pis}}" class="form-control" maxlength="14">
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text" name="pis"  value="PIS não informado." class="form-control" maxlength="14">
                        </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->numCtps) > 0)
                        <div class="form-group col-sm-3">
                            <input type="text" name="numCtps"  value="{{$cliente->pessoaFisica->numCtps}}" class="form-control" maxlength="7">
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text" name="numCtps"  value="Número da CTPS não informado." class="form-control" maxlength="7">
                        </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->serieCtps) > 0)
                        <div class="form-group col-sm-2">
                            <input type="text" name="serieCtps"  value="{{$cliente->pessoaFisica->serieCtps}}" class="form-control" maxlength="5">
                        </div>
                    @else
                        <div class="form-group col-sm-2">
                            <input type="text" name="serieCtps"  value="Série CTPS não informado." class="form-control" maxlength="5">
                        </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->profissao) > 0)
                        <div class="form-group input-group col-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="profissao">Profissão</span>
                            </div>
                            <input type="text" name="profissao"  value="{{$cliente->pessoaFisica->profissao}}"class="custom-select" id="profissao">
                        </div>
                    @else
                        <div class="form-group input-group col-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="profissao">Profissão</span>
                            </div>
                            <input type="text" name="profissao"  value="Não informada."class="custom-select" id="profissao">
                        </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->tituloEleitor) > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="tituloEleitor"  value="{{$cliente->pessoaFisica->tituloEleitor}}" class="form-control" maxlength="19">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="tituloEleitor"  value="Não informado." class="form-control" maxlength="19">
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->idtCivil) > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="idtCivil"   value="{{$cliente->pessoaFisica->idtCivil}}" class="form-control" maxlength="13">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="idtCivil"   value="Número do registro geral não informado." class="form-control" maxlength="13">
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->orgExpeditor) > 0)
                    <div class="form-group input-group col-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="orgExpeditor">Orgão expeditor</span>
                        </div>
                        <input type="text" name="orgExpeditor"  value="{{$cliente->pessoaFisica->orgExpeditor}}"class="custom-select" id="orgExpeditor">
                    </div>
                    @else
                    <div class="form-group input-group col-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="orgExpeditor">Orgão expeditor</span>
                        </div>
                        <input type="text" name="orgExpeditor"  value="Orgão não infomado."class="custom-select" id="orgExpeditor">
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->dtExpedicao) > 0)
                    <div class="form-group col-sm-2" align="right">
                        <strong>Data de expedição </strong>
                    </div>
                    <div class="form-group col-sm-2">
                        <input type="date" name="dtExpedicao"  class="form-control" value="{{$cliente->pessoaFisica->dtExpedicao}}">
                    </div>
                    @else
                    <div class="form-group col-sm-2" align="right">
                        <strong>Data de expedição </strong>
                    </div>
                    <div class="form-group col-sm-2">
                        <input type="date" name="dtExpedicao"  class="form-control" value="Não informado.">
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->sexo) > 0)
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="sexo">Sexo</span>
                        </div>
                        <input type="text" name="sexo"  value="{{$cliente->pessoaFisica->sexo}}"class="custom-select" id="sexo">
                    </div>
                    @else
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="sexo">Sexo</span>
                        </div>
                        <input type="text" name="sexo"  value="Não informado"class="custom-select" id="sexo">
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->estadoCivil) > 0)
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="estadoCivil">Estado civil</span>
                        </div>
                        <input type="text" name="estadoCivil"  value="{{$cliente->pessoaFisica->estadoCivil}}"class="custom-select" id="estadoCivil">
                    </div>
                    @else
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="estadoCivil">Estado civil</span>
                        </div>
                        <input type="text" name="estadoCivil"  value="Não informado."class="custom-select" id="estadoCivil">
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->tratamento) > 0)
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="tratamento">Tratamento</span>
                        </div>
                        <input type="text" name="tratamento"  value="{{$cliente->pessoaFisica->tratamento}}"class="custom-select" id="tratamento">
                    </div>
                    @else
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="tratamento">Tratamento</span>
                        </div>
                        <input type="text" name="tratamento"  value="Não informado."class="custom-select" id="tratamento">
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->nacionalidade) > 0)
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nacionalidade</span>
                        </div>
                        <input type="text" name="nacionalidade"  value="{{$cliente->pessoaFisica->nacionalidade}}" class="custom-select" >
                    </div>
                    @else
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nacionalidade</span>
                        </div>
                        <input type="text" name="nacionalidade"  value="Não informado." class="custom-select" >
                    </div>
                    @endif

                    @if(isset($cliente->pessoaFisica->dtNascimento) > 0)
                    <div class="form-group col-sm-2" align="right">
                    <strong>Data de Nascimento </strong>
                    </div>
                    <div class="form-group col-sm-2">
                        <input type="date" name="dtNascimento" class="form-control"  value="{{$cliente->pessoaFisica->dtNascimento}}">
                    </div>
                    @else
                    <div class="form-group col-sm-2" align="right">
                    <strong>Data de Nascimento </strong>
                    </div>
                    <div class="form-group col-sm-2">
                        <input type="text" name="dtNascimento" class="form-control"  value="Não informado.">
                    </div>
                    @endif

                    <div class="form-group col-sm-4">
                        <input type="text" name="nomeMae"  value="@if(isset($cliente->pessoaFisica->nomeMae)){{$cliente->pessoaFisica->nomeMae}}@else Não há dados cadastrados. @endif" class="form-control" maxlength="150">
                    </div>                    
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
                        <input type="text" name="nome_empresa"  value="{{$cliente->nome_empresa}}" class="form-control @error('nome_empresa') is-invalid @enderror">
                            @error('nome_empresa')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                            @enderror
                    </div>

                    <div class="form-group col-sm-3">
                        <input type="text" name="numero"  value="{{$cliente->pessoaJuridica->numero}}" class="form-control" maxlength="18">
                    </div>

                    @if($cliente->pessoaJuridica->inscMunicipal > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal"  value="{{$cliente->pessoaJuridica->inscMunicipal}}" class="form-control">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal"  placeholder="Inscrição Municipal não informada." class="form-control">
                    </div>
                    @endif

                    @if($cliente->pessoaJuridica->insEstadual > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal"  value="{{$cliente->pessoaJuridica->insEstadual}}" class="form-control">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscEstadual"  placeholder="Inscrição Estadual não informada." class="form-control">
                    </div>
                    @endif

                    @if($cliente->pessoaJuridica->codigo > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="codigo"  value="{{$$cliente->pessoaJuridica->codigo}}" class="form-control">
                    </div>
                    @else
                    <div class="form-group col-sm-3">
                        <input type="text" name="codigo"  placeholder="Código não informado." class="form-control">
                    </div>
                    @endif
                    <div class="form-group col-sm-1">
                        <input type="text" name="natureza_pj"  value="{{$cliente->pessoaJuridica->natureza_pj}}" class="form-control">
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
                            <input type="text"  value="{{$cliente->endereco->cep}}" name="cep"  id="cep" class="form-control" maxlength="8">
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text"  placeholder="CEP não informado" name="cep"  id="cep" class="form-control" maxlength="8">
                        </div>
                    @endif

                    @if(isset($cliente->endereco->logradouro) > 0)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$cliente->endereco->logradouro}}" name="logradouro"  id="rua" class="form-control" maxlength="150">
                        </div>
                    @else
                        <div class="form-group col-sm-4">
                            <input type="text" value="Logradouro não informado." name="logradouro"  id="rua" class="form-control" maxlength="150">
                        </div>
                    @endif

                    @if(isset($cliente->endereco->numEndereco) > 0)
                        <div class="form-group col-1">
                            <input value="{{$cliente->endereco->numEndereco}}" type="text" name="numEndereco"  class="form-control" maxlength="10">
                        </div>
                    @else
                        <div class="form-group col-2">
                            <input value="Nº não informado" type="text" name="numEndereco"  class="form-control" maxlength="10">
                        </div>
                    @endif

                    @if(isset($cliente->endereco->complemento) > 0)
                        <div class="form-group col-3">
                            <input value="{{$cliente->endereco->complemento}}"  type="text" name="complemento"  class="form-control" maxlength="50">
                        </div>
                    @else
                        <div class="form-group col-3">
                            <input value="Complemento não informado."  type="text" name="complemento"  class="form-control" maxlength="50">
                        </div>
                    @endif

                    @if(isset($cliente->endereco->bairro) > 0)
                        <div class="form-group col-sm-3">
                            <input type="text" value="{{$cliente->endereco->bairro}}" name="bairro" id="bairro"  class="form-control" maxlength="60">
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text" value="Bairro não informado." name="bairro" id="bairro"  class="form-control" maxlength="60">
                        </div>
                    @endif

                    @if(isset($cliente->endereco->cidade) > 0)
                        <div class="form-group col-sm-3">
                            <input type="text" value="{{$cliente->endereco->cidade}}" name="cidade" id="cidade"  class="form-control" maxlength="60">
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text" value="Cidade não informada." name="cidade" id="cidade"  class="form-control" maxlength="60">
                        </div>
                    @endif

                    @if(isset($cliente->endereco->uf) > 0)
                        <div class="form-group col-sm-1">
                            <input type="text" value="{{$cliente->endereco->uf}}" name="uf" id="uf"  class="form-control" maxlength="2">
                        </div>
                    @else
                        <div class="form-group col-sm-2">
                            <input type="text" value="UF não informada." name="uf" id="uf"  class="form-control" maxlength="2">
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
                            <input type="text" value="{{$contato->email}}" name="email"  class="form-control" maxlength="100">
                        </div>

                        @if(isset($contato->telefone) > 0)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$contato->telefone}}" name="telefone"  class="form-control" maxlength="13">
                        </div>
                        @else
                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Telefone não informado." name="telefone"  class="form-control" maxlength="13">
                        </div>
                        @endif

                        @if(isset($contato->celular) > 0)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$contato->celular}}" name="celular"  class="form-control" maxlength="14">
                        </div>
                        @else
                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Celular não informado." name="celular"  class="form-control" maxlength="14">
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
                <div class="tab-content col-md-12">
                    <div role="tabpanel" class="tab-pane nav-link active tabela" id="processo_todos">
                        @if(count($processos_todos) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-5">Pasta do processo</th>
                                    <th class="col-2">Número do processo</th>
                                    <th class="col-2">Data de distribuição</th>
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
                                    <td>{{$processo_cliente->numProcesso}}</td>
                                    <td>
                                        @php
                                        $data_distribuicao = new DateTime($processo_cliente->dtDistribuicao);
                                        //dd($processo->dtDistribuicao);
                                        echo $data_distribuicao->format('d/m/Y');
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                        if($processo_cliente->ultAndamento > 0){
                                            $data_andamento = new DateTime($processo_cliente->ultAndamento);
                                            echo $data_andamento->format('d/m/Y');
                                        }else{
                                            echo 'Não há andamento.';
                                        }
                                        @endphp
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
                                    <th class="col-5">Pasta do processo</th>
                                    <th class="col-2">Número do processo</th>
                                    <th class="col-2">Data de distribuição</th>
                                    <th class="col-2">Andamento</th>
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

                    <div role="tabpanel" class="tab-pane nav-link tabela" id="servico_todos">
                        @if(count($servicos_todos) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-4">Pasta do serviço</th>
                                    <th class="col-3">Contrato</th>
                                    <th class="col-2">Data de abertura</th>
                                    <th class="col-2">Situação</th>
                                    <th class="col">Vincular</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($servicos_todos as $servico_cliente)
                                <tr>
                                    <td>
                                        <a href="{{route('cadastro.edit', $servico_cliente->id)}}">
                                            {{$servico_cliente->pasta_servico}}
                                        </a>
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
                                    <th class="col-5">Pasta do processo</th>
                                    <th class="col-2">Número do processo</th>
                                    <th class="col-2">Data de distribuição</th>
                                    <th class="col-2">Andamento</th>
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
                                    <td>{{$processo->numProcesso}}</td>
                                    <td>
                                        @php
                                        $data_distribuicao = new DateTime($processo->dtDistribuicao);
                                        //dd($processo->dtDistribuicao);
                                        echo $data_distribuicao->format('d/m/Y');
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                        if($processo->ultAndamento > 0){
                                            $data_andamento = new DateTime($processo->ultAndamento);
                                            echo $data_andamento->format('d/m/Y');
                                        }else{
                                            echo 'Não há andamento.';
                                        }
                                        @endphp
                                    </td>
                                    <td>
                                        <form action="{{route('processo.destroy', $processo->id)}}" method="POST">
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
                        <div>
                            {{ $processos->links() }}
                        </div>
                        @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-5">Pasta do processo</th>
                                    <th class="col-2">Número do processo</th>
                                    <th class="col-2">Data de distribuição</th>
                                    <th class="col-2">Andamento</th>
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
                                    <th class="col-5">Pasta do serviço</th>
                                    <th class="col-2">Contrato</th>
                                    <th class="col-2">Data de abertura</th>
                                    <th class="col-2">Situação</th>
                                    <th class="col">Desvincular</th>
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
                                        <form action="{{route('servico.destroy', $servico->id)}}" method="POST">
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


    <script src="{{url('js/botao_pf_pj.js')}}"></script>
    <script src="{{url('js/viacep_cliente.js')}}"></script>
    <script src="{{url('js/viacep_parte_contraria.js')}}"></script>
@endsection


