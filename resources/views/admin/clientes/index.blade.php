@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>
        Meus clientes
        <a href="{{route('cadastro.create')}}" class="btn btn-sm btn-success">
        <i class="fas fa-user-plus"></i> Novo cliente
        </a>
    </h1>
@endsection
@section('content')
<div class="card col-12">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="col-1">Ordem</th>
                    <th class="col-4">Nome</th>
                    <th class="col-3">CPF / CNPJ</th>
                    <th class="col-2">Processo</th>
                    <th class="col-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td><a data-toggle="modal" data-target="#listaCliente" href="{{route('cadastro.show', [$cliente->id])}}">@if(isset($cliente->nome) > 0){{$cliente->nome}} @else {{$cliente->nome_empresa}}@endif</a></td>
                    <td>@if(!empty($cliente->pessoaJuridica->numero) > 0){{substr_replace(substr_replace(substr_replace(substr_replace($cliente->pessoaJuridica->numero, '-', 12, 0), '/', 8, 0), '.', 5, 0), '.', 2, 0)}}
                        @else{{substr_replace(substr_replace(substr_replace($cliente->pessoaFisica->cpf, '-', 9, 0 ), '.', 6, 0), '.', 3, 0 )}}
                        @endif

                    </td>
                    <td><a data-toggle="modal" data-target="#listaProcesso" href="">@if(!empty($cliente->processo->pasta) > 0){{$cliente->processo->pasta}}@else @endif</a></td>
                    <td>
                        <a href="{{route('cadastro.edit', $cliente->id)}}" class="btn btn-sm btn-warning">Editar</a>
                        <form class="d-inline" method="POST" action="{{route('cadastro.destroy', $cliente->id)}}" onsubmit="return confirm('Isso irá excluir, deseja continuar?')" >
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <!-- Modal lista cliente -->
            <div class="modal fade" id="listaCliente" tabindex="-1" aria-labelledby="listaCliente" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="listaCliente">Dados de @if(isset($cliente->nome) > 0){{$cliente->nome}} @else {{$cliente->nome_empresa}} @endif</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @if ($cliente->pessoafisica > 0)
                        <div class="modal-body">
                            <div class="row">
                                <label class="col-sm-4 col-form-label"> Nome completo </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{ucfirst($cliente->pessoaFisica->tratamento)}} {{ucwords($cliente->nome)}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> CPF / CNPJ </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">@if(!empty($cliente->pessoaJuridica->numero) > 0){{substr_replace(substr_replace(substr_replace(substr_replace($cliente->pessoaJuridica->numero, '-', 12, 0), '/', 8, 0), '.', 5, 0), '.', 2, 0)}}  @else{{substr_replace(substr_replace(substr_replace($cliente->pessoaFisica->cpf, '-', 9, 0 ), '.', 6, 0), '.', 3, 0 )}} @endif</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Identidade </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{substr_replace(substr_replace(substr_replace($cliente->pessoaFisica->idtCivil, '-', 8, 0 ), '.', 5, 0), '.', 2, 0 )}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label">PIS</label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{substr_replace(substr_replace(substr_replace($cliente->pessoaFisica->pis, '-', 10, 0), '.', 8, 0), '.', 3, 0)}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Nº CTPS </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{$cliente->pessoaFisica->numCtps}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Série CTPS </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{substr_replace(substr_replace($cliente->pessoaFisica->serieCtps, '-', 5, 0), '/', 2, 0)}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Título de Eleitor </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{substr_replace(substr_replace(substr_replace($cliente->pessoaFisica->tituloEleitor,' ', 12, 0),' ', 8, 0), ' ', 4, 0)}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Gênero </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{ucfirst($cliente->pessoaFisica->sexo)}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Nacionalidade </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{ucfirst($cliente->pessoaFisica->nacionalidade)}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Estado civil </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{ucfirst($cliente->pessoaFisica->estadoCivil)}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Profissão </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{$cliente->pessoaFisica->profissao}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Mãe </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{$cliente->pessoaFisica->nomeMae}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Data de nascimento </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{date('d/m/Y', strtotime($cliente->pessoaFisica->dtNascimento))}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Logradouro </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{$cliente->endereco->logradouro}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Número </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{$cliente->endereco->numEndereco}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Complemento </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">@if(!empty($cliente->endereco->complemento) < 0)  S/N  @else {{$cliente->endereco->complemento}} @endif</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Bairro </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{$cliente->endereco->bairro}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Cidade </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{$cliente->endereco->cidade}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> Estado </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{$cliente->endereco->uf}}</ol>
                                </div>

                                <label class="col-sm-4 col-form-label"> CEP </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{substr_replace($cliente->endereco->cep, '-', 5, 0)}}</ol>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        @else($cliente->pessoajurica)
                        <div class="modal-body">
                            <div class="row">
                                <label class="col-sm-4 col-form-label"> Número </label>
                                <div class="col-sm-8">
                                    <ol type="text" readonly class="form-control-plaintext">{{substr_replace(substr_replace(substr_replace(substr_replace($cliente->pessoaJuridica->numero, '-', 12, 0), '/', 8, 0), '.', 5, 0), '.', 2, 0)}}</ol>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </table>
    </div>
</div>
    {{$clientes->links()}}
@endsection
