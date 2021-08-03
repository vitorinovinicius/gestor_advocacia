@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>
        Meus clientes
        <a href="{{route('cadastro.create')}}" class="btn btn-sm btn-success">
            Novo cliente
        </a>
    </h1>
@endsection
@section('content')
<div class="card col-12">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">#</th>
                    <th width="500px">Nome</th>
                    <th width="500px">CPF / CNPJ</th>
                    <th width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td><a href="{{route('cadastro.show', [$cliente->id])}}">{{$cliente->nome}}</a></td>
                    <td>@if(!empty($cliente->pessoaJuridica->numero) > 0){{substr_replace(substr_replace(substr_replace(substr_replace($cliente->pessoaJuridica->numero, '-', 12, 0), '/', 8, 0), '.', 5, 0), '.', 2, 0)}}
                        @else{{substr_replace(substr_replace(substr_replace($cliente->pessoaFisica->cpf, '-', 9, 0 ), '.', 6, 0), '.', 3, 0 )}}
                        @endif
                    </td>
                    <td>
                        <a href="{{route('cadastro.edit', [$cliente->id])}}" class="btn btn-sm btn-warning">Editar</a>
                        <form class="d-inline" method="POST" action="{{route('cadastro.destroy', [$cliente->id])}}" onsubmit="return confirm('Isso irá excluir, deseja continuar?')" >
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$clientes->links()}}
@endsection
