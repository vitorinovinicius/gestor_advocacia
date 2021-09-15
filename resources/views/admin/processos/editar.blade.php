@extends('adminlte::page')

@section('title', 'Atualizar processo')

@section('content_header')
@section('css')
    <link rel="stylesheet" href="{{url('css/app.css')}}">
@endsection
    <h1>
        Atualizar dados processo
        <a href="{{route('processo.index')}}" class="btn btn-sm btn-success">
            Voltar
        </a>
    </h1>
@endsection

@section('content')
    <form action="{{ route('processo.update', $processo->id) }}" method="POST" class="atualizar_processo">
        @method('PUT')
        @csrf
        <div class="card cadastro parte_contraria">
            <div class="card-header">
                <strong>PROCESSO</strong>
            </div>
            <div class="card-body col-12">
                <p class="card-text">
                    <div class="row">
                        <div class="form-group col-sm-9">
                            <input type="text"  value="{{$processo->pasta}}" name="pasta" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" value="{{$processo->instInicial}}" placeholder="Instância inicial" name="instInicial" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$processo->numInicial}}" placeholder="Não há número da inicial cadastrado." name="numInicial" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$processo->numPrincipal}}" placeholder="Não há número principal cadastrado." name="numPrincipal" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$processo->numProcesso}}" placeholder="Não há número de processo cadastrado." name="numProcesso" id="masc_processo" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="date" value="{{$processo->dtDistribuicao}}" name="dtDistribuicao" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" value="{{$processo->acao}}"  placeholder="Ação" name="acao" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" value="{{$processo->fase}}"  placeholder="Fase" name="fase" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" value="{{$processo->natureza}}"  placeholder="Natureza" name="natureza" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$processo->rito}}"  placeholder="Rito" name="rito" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$processo->parte_contraria}}" placeholder="Parte contrária" name="parte_contraria" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$processo->advContrario}}" placeholder="Advogado da parte contrária" name="advContrario" class="form-control">
                        </div>

                        <div class="form-group col-sm-6">
                            <input type="text" value="{{$processo->orgao_inicial}}" placeholder="Órgão Inicial" name="orgao_inicial" class="form-control">
                        </div>

                        <div class="form-group col-sm-6">
                            <textarea type="text" placeholder="Título" name="titulo" class="form-control">{{$processo->titulo}}</textarea>
                        </div>
                    </div>
                </p>
            </div><!-- FIM DO COLLAPSE PARTE CONTRÁRIA -->
            <div class="form-group"> <!-- BOTÃO SUBMIT DO FORM -->
                <div class="col-sm-12" align="right">
                    <input type="submit" class="btn btn-success" value="Atualizar">
                </div>
            </div>
        </div>

        <div class="card cadastro parte_contraria">
            <div class="card-header">
                <strong>LISTA DE CLIENTES</strong>
            </div>
            <div class="col-md-12">
                <p class="card-text col-md-12" role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="nav-item" >
                            <a class="nav-link active" href="#cliente" aria-controls="cliente" data-toggle="tab" role="tab">
                                @if(isset($processo->Cliente) == 1)
                                Cliente
                                @else
                                Clientes
                                @endif
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content table-responsive-sm">
                        <div role="tabpanel" class="tab-pane nav-link active tabela" id="cliente">
                            @if(count($processo->cliente) > 0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-5">Nome completo</th>
                                        <th class="col-2">CPF / CNPJ</th>
                                        <th class="col-2">Andamento</th>
                                        <th class="col-2">Data de distribuição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($processo->cliente as $cliente)
                                    <tr>
                                        <td>
                                            <a href="{{route('cadastro.show', $cliente->id)}}">
                                                {{$cliente->nome}}
                                            </a>
                                        </td>
                                        <td>
                                            {{$cliente->pessoaFisica->cpf}}
                                        </td>
                                        <td>
                                            @php
                                            if($cliente->ultAndamento > 0){
                                                $data_andamento = new DateTime($cliente->ultAndamento);
                                                echo $data_andamento->format('d/m/Y');
                                            }else{
                                                echo 'Não há andamento.';
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            $data_distribuicao = new DateTime($processo->dtDistribuicao);
                                            //dd($cliente->dtDistribuicao);
                                            echo $data_distribuicao->format('d/m/Y');
                                            @endphp
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
                    </div>
                </p>
            </div>
        </div>
    </form>
@endsection
@section('js')
<script src="{{url('js/atualizar_processo.js')}}"></script>
@endsection
