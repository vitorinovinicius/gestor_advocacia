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
        </table>
    </div>
</div>
    {{$clientes->links()}}
@endsection
