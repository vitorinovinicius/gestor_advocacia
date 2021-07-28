@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>
        Meus clientes
        <a href="#" class="btn btn-sm btn-success">
            Nova página
        </a>
    </h1>
@endsection
@section('content')
@if(!empty($processo->cliente->id))
<div class="container">Nenhum processo encontrado!</div>
@else
<div class="card container">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">#</th>
                    <th width="500px">Vínculos</th>
                    <th width="500px">Andamento</th>
                    <th width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($processo->cliente as $dados)
                <tr>
                    <td>{{$dados->id}}</td>
                    <td><a href="{{route('cadastro.show', [$dados->id])}}">{{$dados->nome}}</a></td>
                    <td>@if($dados->ultAndamento > 0){{date('d/m/Y', strtotime($processo->ultAndamento))}}  @else Não há andamento. @endif</td>
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
