@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>
        Meus clientes
    </h1>
@endsection
@section('content')
<div class="card container">
    <div class="card-body">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"> Nome completo </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{ucfirst($cliente->pessoaFisica->tratamento)}} {{$cliente->nome}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> CPF / CNPJ </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">@if(!empty($cliente->pessoaJuridica->numero) > 0){{substr_replace(substr_replace(substr_replace(substr_replace($cliente->pessoaJuridica->numero, '-', 12, 0), '/', 8, 0), '.', 5, 0), '.', 2, 0)}}  @else{{substr_replace(substr_replace(substr_replace($cliente->pessoaFisica->cpf, '-', 9, 0 ), '.', 6, 0), '.', 3, 0 )}} @endif</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Identidade </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{substr_replace(substr_replace(substr_replace($cliente->pessoaFisica->idtCivil, '-', 8, 0 ), '.', 5, 0), '.', 2, 0 )}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> PIS / PASEP </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{substr_replace(substr_replace(substr_replace($cliente->pessoaFisica->pis, '-', 10, 0), '.', 8, 0), '.', 3, 0)}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Nº CTPS </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{$cliente->pessoaFisica->numCtps}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Série CTPS </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{substr_replace(substr_replace($cliente->pessoaFisica->serieCtps, '-', 5, 0), '/', 2, 0)}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Título de Eleitor </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{substr_replace(substr_replace(substr_replace($cliente->pessoaFisica->tituloEleitor,' ', 12, 0),' ', 8, 0), ' ', 4, 0)}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Nacionalidade </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{ucfirst($cliente->pessoaFisica->nacionalidade)}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Estado civil </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{ucfirst($cliente->pessoaFisica->estadoCivil)}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Profissão </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{$cliente->pessoaFisica->profissao}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Mãe </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{$cliente->pessoaFisica->nomeMae}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Data de nascimento </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{date('d/m/Y', strtotime($cliente->pessoaFisica->dtNascimento))}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Logradouro </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{$cliente->endereco->logradouro}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Número </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{$cliente->endereco->numEndereco}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Complemento </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">@if(!empty($cliente->endereco->complemento) > 0)  S/N  @else {{$cliente->endereco->complemento}} @endif</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Bairro </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{$cliente->endereco->bairro}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Cidade </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{$cliente->endereco->cidade}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> Estado </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{$cliente->endereco->uf}}</ol>
            </div> <hr>

            <label class="col-sm-2 col-form-label"> CEP </label>
            <div class="col-sm-10">
                <ol type="text" readonly class="form-control-plaintext">{{substr_replace($cliente->endereco->cep, '-', 5, 0)}}</ol>
            </div> <hr>
        </div>
            <a href="#" class="btn btn-sm btn-warning">Editar</a>
            <form class="d-inline" method="POST" action="#" onsubmit="return confirm('Isso irá excluir, deseja continuar?')" >
                @method('delete')
                @csrf
                <button class="btn btn-sm btn-danger">Excluir</button>
            </form>
    </div>
</div>
@if(!empty($cliente->processo->id))
<div class="container">Nenhum processo encontrado!</div>
@else
<div class="card container">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">#</th>
                    <th width="500px">Parte contrária</th>
                    <th width="500px">Andamento</th>
                    <th width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cliente->processo as $dados)
                <tr>
                    <td>{{$dados->id}}</td>
                    <td><a href="{{route('processo.show', [$dados->id])}}">{{$dados->parteContraria}}</a></td>
                    <td>@if($dados->ultAndamento > 0){{date('d/m/Y', strtotime($dados->ultAndamento))}}  @else Não há andamento. @endif</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
