@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>
        Meus clientes
    </h1>
@endsection
@section('content')
@if(!empty($processo->cliente->id))
<div class="container">Nenhum processo encontrado!</div>
@else
<div class="card col-12">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">#</th>
                    <th width="500px">Vínculos</th>
                    <th width="500px">Compromissos</th>
                    <th width="500px">Título</th>
                    <th width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($processo->cliente as $dados)
                <tr>
                    <td>{{$dados->id}}</td>
                    <td><a href="{{route('cadastro.show', [$dados->id])}}">{{$dados->nome}}</a></td>
                    <td>@if(isset($processo->compromisso) > 0){{$processo->compromisso}} @else Não há compromisso. @endif</td>
                    <td>{{$processo->titulo}}</td>
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
