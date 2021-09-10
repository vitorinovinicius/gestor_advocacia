@extends('adminlte::page')

@section('title', 'Processos')

@section('content_header')
@section('css')
    <link rel="stylesheet" href="{{url('css/app.css')}}">
@endsection
    <h1>
        Novo processo
        <a href="{{route('processo.index')}}" class="btn btn-sm btn-success">
            Voltar
        </a>
    </h1>
@endsection

@section('content')
    <form action="{{ route('processo.store') }}" method="POST" onsubmit="return confirm('Verique todos os campos antes de salvar!')" >
        @method('PUT')
        @csrf
        <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cliente" value="parte_contraria">
                <label class="form-check-label">
                    Parte contrária
                </label>
            </div> <!-- FIM BOTÃO COLLAPSE PARTE CONTRÁRIA -->

            <div class="card cadastro parte_contraria">
                <div class="card-header">
                    <strong>PARTE CONTRÁRIA</strong>
                </div>
                <div class="card-body col-12">
                    <p class="card-text">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text"  placeholder="Nome da parte contrária" name="nome" class="form-control">
                            </div>

                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Pasta" name="pasta" value="{{$processo->pasta}}" class="form-control">
                            </div>

                            <div class="form-group col-sm-2">
                                <input type="text"  placeholder="Número da Inicial" name="numInicial" class="form-control">
                            </div>

                            <div class="form-group col-sm-2">
                                <input type="text"  placeholder="Número Principal" name="numPrincipal" class="form-control">
                            </div>

                            <div class="form-group col-sm-2">
                                <input type="text"  placeholder="Número do Processo" name="numProcesso" class="form-control">
                            </div>

                            <div class="form-group col-sm-2">
                                <input type="date"  placeholder="Data de Distribuição" name="dtDistribuicao" value="{{$processo->dtDistribuicao}}" class="form-control">
                            </div>

                            <div class="form-group col-sm-6">
                                <input type="text"  placeholder="Advogado da parte contrária" name="advContraria" class="form-control">
                            </div>

                            <div class="form-group col-sm-12">
                                <textarea class="form-control"type="text"  placeholder="Título" name="titulo"></textarea>
                            </div>
                        </div>
                    </p>
                </div><!-- FIM DO COLLAPSE PARTE CONTRÁRIA -->

                <div class="card-header">
                    <strong>ENDEREÇO</strong>
                </div>
                <div class="card-body col-12">
                    <p class="card-text">
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <input type="text"  placeholder="Insira somente os números do CEP." name="cep" id="cep2" class="form-control">
                            </div>

                            <div class="form-group col-sm-4">
                                <input type="text" placeholder="Logradouro" name="logradouro" id="rua2" class="form-control">
                            </div>

                            <div class="form-group col-1">
                                <input type="text" placeholder="Número" name="numEndereco" class="form-control">
                            </div>

                            <div class="form-group col-3">
                                <input type="text" placeholder="Complemento"  name="complemento" class="form-control">
                            </div>

                            <div class="form-group col-sm-3">
                                <input type="text" placeholder="Bairro" name="bairro" id="bairro2" class="form-control">
                            </div>

                            <div class="form-group col-sm-3">
                                <input type="text" placeholder="Cidade" name="cidade" id="cidade2" class="form-control">
                            </div>

                            <div class="form-group col-sm-1">
                                <input type="text" placeholder="Estado" name="uf" id="uf2" class="form-control">
                            </div>
                        </div>
                    </p>
                </div><!-- FIM DO COLLAPSE ENDEREÇO PARTE CONTRÁRIA -->
            </div>
        </div>
        <div class="form-group"> <!-- BOTÃO SUBMIT DO FORM -->
            <div class="col-sm-12" align="right">
                <input type="submit" class="btn btn-success" value="Cadastrar">
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="card col-md-12" role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="nav-item" >
                            <a class="nav-link active" href="#cliente" aria-controls="cliente" data-toggle="tab" role="tab">Cliente</a>
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
                </div>
            </div>
        </div>
    </form>
@endsection
@section('footer')
@endsection
