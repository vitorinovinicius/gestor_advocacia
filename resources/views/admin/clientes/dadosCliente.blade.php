@extends('adminlte::page')

@section('title', 'Dados do cliente ')

@section('content_header')
@section('css')
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/dados_cliente.css')}}">
@endsection
@section('script')
    <script src="{{url('js/jquery.min.js')}}"></script>
@endsection
    <h1>
            Dados do cliente
        <a href="{{route('cadastro.index')}}" class="btn btn-sm btn-success">
        <i class="fas fa-reply"></i>
            Voltar
        </a>
    </h1>
@endsection

@section('content')
<form method="post">
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
                    <input type="text" name="nome" disabled value="{{$cliente->nome}}" class="form-control" maxlength="150">
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" name="cpf" disabled value="@if(isset($cliente->pessoaFisica->cpf)){{$cliente->pessoaFisica->cpf}}@else Não há dados cadastrados. @endif" class="form-control" maxlength="14">
                </div>

                @if(isset($cliente->pessoaFisica->pis) > 0)
                    <div class="form-group col-sm-3">
                        <input type="text" name="pis" disabled value="{{$cliente->pessoaFisica->pis}}" class="form-control" maxlength="14">
                    </div>
                @else
                    <div class="form-group col-sm-3">
                        <input type="text" name="pis" disabled value="PIS não informado." class="form-control" maxlength="14">
                    </div>
                @endif

                @if(isset($cliente->pessoaFisica->numCtps) > 0)
                    <div class="form-group col-sm-3">
                        <input type="text" name="numCtps" disabled value="{{$cliente->pessoaFisica->numCtps}}" class="form-control" maxlength="7">
                    </div>
                @else
                    <div class="form-group col-sm-3">
                        <input type="text" name="numCtps" disabled value="Número da CTPS não informado." class="form-control" maxlength="7">
                    </div>
                @endif

                @if(isset($cliente->pessoaFisica->serieCtps) > 0)
                    <div class="form-group col-sm-2">
                        <input type="text" name="serieCtps" disabled value="{{$cliente->pessoaFisica->serieCtps}}" class="form-control" maxlength="5">
                    </div>
                @else
                    <div class="form-group col-sm-2">
                        <input type="text" name="serieCtps" disabled value="Série CTPS não informado." class="form-control" maxlength="5">
                    </div>
                @endif

                @if(isset($cliente->pessoaFisica->profissao) > 0)
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="profissao">Profissão</span>
                        </div>
                        <input type="text" name="profissao" disabled value="{{$cliente->pessoaFisica->profissao}}"class="custom-select" id="profissao">
                    </div>
                @else
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="profissao">Profissão</span>
                        </div>
                        <input type="text" name="profissao" disabled value="Não informada."class="custom-select" id="profissao">
                    </div>
                @endif

                @if(isset($cliente->pessoaFisica->tituloEleitor) > 0)
                <div class="form-group col-sm-4">
                    <input type="text" name="tituloEleitor" disabled value="{{$cliente->pessoaFisica->tituloEleitor}}" class="form-control" maxlength="19">
                </div>
                @else
                <div class="form-group col-sm-4">
                    <input type="text" name="tituloEleitor" disabled value="Não informado." class="form-control" maxlength="19">
                </div>
                @endif

                @if(isset($cliente->pessoaFisica->idtCivil) > 0)
                <div class="form-group col-sm-4">
                    <input type="text" name="idtCivil" disabled  value="{{$cliente->pessoaFisica->idtCivil}}" class="form-control" maxlength="13">
                </div>
                @else
                <div class="form-group col-sm-4">
                    <input type="text" name="idtCivil" disabled  value="Número do registro geral não informado." class="form-control" maxlength="13">
                </div>
                @endif

                @if(isset($cliente->pessoaFisica->orgExpeditor) > 0)
                <div class="form-group input-group col-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="orgExpeditor">Orgão expeditor</span>
                    </div>
                    <input type="text" name="orgExpeditor" disabled value="{{$cliente->pessoaFisica->orgExpeditor}}"class="custom-select" id="orgExpeditor">
                </div>
                @else
                <div class="form-group input-group col-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="orgExpeditor">Orgão expeditor</span>
                    </div>
                    <input type="text" name="orgExpeditor" disabled value="Orgão não infomado."class="custom-select" id="orgExpeditor">
                </div>
                @endif

                @if(isset($cliente->pessoaFisica->dtExpedicao) > 0)
                <div class="form-group col-sm-2" align="right">
                    <strong>Data de expedição </strong>
                </div>
                <div class="form-group col-sm-2">
                    <input type="date" name="dtExpedicao" disabled class="form-control" value="{{$cliente->pessoaFisica->dtExpedicao}}">
                </div>
                @else
                <div class="form-group col-sm-2" align="right">
                    <strong>Data de expedição </strong>
                </div>
                <div class="form-group col-sm-2">
                    <input type="date" name="dtExpedicao" disabled class="form-control" value="Não informado.">
                </div>
                @endif

                @if(isset($cliente->pessoaFisica->sexo) > 0)
                <div class="form-group input-group col-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="sexo">Sexo</span>
                    </div>
                    <input type="text" name="sexo" disabled value="{{$cliente->pessoaFisica->sexo}}"class="custom-select" id="sexo">
                </div>
                @else
                <div class="form-group input-group col-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="sexo">Sexo</span>
                    </div>
                    <input type="text" name="sexo" disabled value="Não informado"class="custom-select" id="sexo">
                </div>
                @endif

                @if(isset($cliente->pessoaFisica->estadoCivil) > 0)
                <div class="form-group input-group col-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="estadoCivil">Estado civil</span>
                    </div>
                    <input type="text" name="estadoCivil" disabled value="{{$cliente->pessoaFisica->estadoCivil}}"class="custom-select" id="estadoCivil">
                </div>
                @else
                <div class="form-group input-group col-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="estadoCivil">Estado civil</span>
                    </div>
                    <input type="text" name="estadoCivil" disabled value="Não informado."class="custom-select" id="estadoCivil">
                </div>
                @endif

                @if(isset($cliente->pessoaFisica->tratamento) > 0)
                <div class="form-group input-group col-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="tratamento">Tratamento</span>
                    </div>
                    <input type="text" name="tratamento" disabled value="{{$cliente->pessoaFisica->tratamento}}"class="custom-select" id="tratamento">
                </div>
                @else
                <div class="form-group input-group col-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="tratamento">Tratamento</span>
                    </div>
                    <input type="text" name="tratamento" disabled value="Não informado."class="custom-select" id="tratamento">
                </div>
                @endif

                @if(isset($cliente->pessoaFisica->nacionalidade) > 0)
                <div class="form-group input-group col-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nacionalidade</span>
                    </div>
                    <input type="text" name="nacionalidade" disabled value="{{$cliente->pessoaFisica->nacionalidade}}" class="custom-select" >
                </div>
                @else
                <div class="form-group input-group col-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nacionalidade</span>
                    </div>
                    <input type="text" name="nacionalidade" disabled value="Não informado." class="custom-select" >
                </div>
                @endif

                @if(isset($cliente->pessoaFisica->dtNascimento) > 0)
                <div class="form-group col-sm-2" align="right">
                <strong>Data de Nascimento </strong>
                </div>
                <div class="form-group col-sm-3">
                    <input type="date" name="dtNascimento" class="form-control" disabled value="{{$cliente->pessoaFisica->dtNascimento}}">
                </div>
                @else
                <div class="form-group col-sm-2" align="right">
                <strong>Data de Nascimento </strong>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" name="dtNascimento" class="form-control" disabled value="Não informado.">
                </div>
                @endif

                <div class="form-group col-sm-6">
                    <input type="text" name="nomeMae" disabled value="@if(isset($cliente->pessoaFisica->nomeMae)){{$cliente->pessoaFisica->nomeMae}}@else Não há dados cadastrados. @endif" class="form-control" maxlength="150">
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
                    <input type="text" name="nome_empresa" disabled value="{{$cliente->nome_empresa}}" class="form-control @error('nome_empresa') is-invalid @enderror">
                        @error('nome_empresa')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                        @enderror
                </div>

                <div class="form-group col-sm-3">
                    <input type="text" name="numero" disabled value="{{$cliente->pessoaJuridica->numero}}" class="form-control" maxlength="18">
                </div>

                @if($cliente->pessoaJuridica->inscMunicipal > 0)
                <div class="form-group col-sm-4">
                    <input type="text" name="inscMunicipal" disabled value="{{$cliente->pessoaJuridica->inscMunicipal}}" class="form-control">
                </div>
                @else
                <div class="form-group col-sm-4">
                    <input type="text" name="inscMunicipal" disabled placeholder="Inscrição Municipal não informada." class="form-control">
                </div>
                @endif

                @if($cliente->pessoaJuridica->insEstadual > 0)
                <div class="form-group col-sm-4">
                    <input type="text" name="inscMunicipal" disabled value="{{$cliente->pessoaJuridica->insEstadual}}" class="form-control">
                </div>
                @else
                <div class="form-group col-sm-4">
                    <input type="text" name="inscEstadual" disabled placeholder="Inscrição Estadual não informada." class="form-control">
                </div>
                @endif

                @if($cliente->pessoaJuridica->codigo > 0)
                <div class="form-group col-sm-4">
                    <input type="text" name="codigo" disabled value="{{$$cliente->pessoaJuridica->codigo}}" class="form-control">
                </div>
                @else
                <div class="form-group col-sm-3">
                    <input type="text" name="codigo" disabled placeholder="Código não informado." class="form-control">
                </div>
                @endif
                <div class="form-group col-sm-1">
                    <input type="text" name="natureza_pj" disabled value="{{$cliente->pessoaJuridica->natureza_pj}}" class="form-control">
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
                        <input type="text"  value="{{$cliente->endereco->cep}}" name="cep" disabled id="cep" class="form-control" maxlength="8">
                    </div>
                @else
                    <div class="form-group col-sm-3">
                        <input type="text"  placeholder="CEP não informado" name="cep" disabled id="cep" class="form-control" maxlength="8">
                    </div>
                @endif

                @if(isset($cliente->endereco->logradouro) > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" value="{{$cliente->endereco->logradouro}}" name="logradouro" disabled id="rua" class="form-control" maxlength="150">
                    </div>
                @else
                    <div class="form-group col-sm-4">
                        <input type="text" value="Logradouro não informado." name="logradouro" disabled id="rua" class="form-control" maxlength="150">
                    </div>
                @endif

                @if(isset($cliente->endereco->numEndereco) > 0)
                    <div class="form-group col-1">
                        <input value="{{$cliente->endereco->numEndereco}}" type="text" name="numEndereco" disabled class="form-control" maxlength="10">
                    </div>
                @else
                    <div class="form-group col-2">
                        <input value="Nº não informado" type="text" name="numEndereco" disabled class="form-control" maxlength="10">
                    </div>
                @endif

                @if(isset($cliente->endereco->complemento) > 0)
                    <div class="form-group col-3">
                        <input value="{{$cliente->endereco->complemento}}"  type="text" name="complemento" disabled class="form-control" maxlength="50">
                    </div>
                @else
                    <div class="form-group col-3">
                        <input value="Complemento não informado."  type="text" name="complemento" disabled class="form-control" maxlength="50">
                    </div>
                @endif

                @if(isset($cliente->endereco->bairro) > 0)
                    <div class="form-group col-sm-3">
                        <input type="text" value="{{$cliente->endereco->bairro}}" name="bairro" id="bairro" disabled class="form-control" maxlength="60">
                    </div>
                @else
                    <div class="form-group col-sm-3">
                        <input type="text" value="Bairro não informado." name="bairro" id="bairro" disabled class="form-control" maxlength="60">
                    </div>
                @endif

                @if(isset($cliente->endereco->cidade) > 0)
                    <div class="form-group col-sm-3">
                        <input type="text" value="{{$cliente->endereco->cidade}}" name="cidade" id="cidade" disabled class="form-control" maxlength="60">
                    </div>
                @else
                    <div class="form-group col-sm-3">
                        <input type="text" value="Cidade não informada." name="cidade" id="cidade" disabled class="form-control" maxlength="60">
                    </div>
                @endif

                @if(isset($cliente->endereco->uf) > 0)
                    <div class="form-group col-sm-1">
                        <input type="text" value="{{$cliente->endereco->uf}}" name="uf" id="uf" disabled class="form-control" maxlength="2">
                    </div>
                @else
                    <div class="form-group col-sm-2">
                        <input type="text" value="UF não informada." name="uf" id="uf" disabled class="form-control" maxlength="2">
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
                        <input type="text" value="{{$contato->email}}" name="email" disabled class="form-control" maxlength="100">
                    </div>

                    @if(isset($contato->telefone) > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" value="{{$contato->telefone}}" name="telefone" disabled class="form-control" maxlength="13">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" placeholder="Telefone não informado." name="telefone" disabled class="form-control" maxlength="13">
                    </div>
                    @endif

                    @if(isset($contato->celular) > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" value="{{$contato->celular}}" name="celular" disabled class="form-control" maxlength="14">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" placeholder="Celular não informado." name="celular" disabled class="form-control" maxlength="14">
                    </div>
                    @endif
                    @endforeach
                </div>
            </p>
        </div>
    <!-- FIM DO CARD CONTATO -->
    </div>

    <div class="col-md-12 table-responsive-sm">
        <div class="row">
            <div class="card col-md-12" role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="nav-item" >
                        <a class="nav-link active" href="#processo" aria-controls="processo" data-toggle="tab" role="tab">Processo</a>
                    </li>

                    <li role="presentation" class="nav-item" >
                        <a class="nav-link" href="#servico" aria-controls="servico" data-toggle="tab" role="tab">Serviço</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane nav-link active tabela" id="processo">
                        @if(count($cliente->processo) > 0)
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
</form>
@endsection

@section('script')
    <script src="{{url('js/botao_pf_pj.js')}}"></script>
    <script src="{{url('js/viacep_cliente.js')}}"></script>
    <script src="{{url('js/viacep_parte_contraria.js')}}"></script>
@endsection


