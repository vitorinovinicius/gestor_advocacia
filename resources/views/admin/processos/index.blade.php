
@extends('adminlte::page')

@section('title', 'Processos')

@section('content_header')
    <h1>
        Meus processos
        <a href="#" class="btn btn-sm btn-success">
            Novo processo
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
                    <th width="500px">Processos</th>
                    <th width="500px">Pasta</th>
                    <th width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($processos as $processo)
                <tr>
                    <td>{{$processo->id}}</td>
                    <td>{{$processo->parteContraria}}</td>
                    <td><a href="{{route('cadastro.show', [$processo->id])}}">@if(!empty($processo->pasta) > 0){{$processo->pasta}} @else Não há pasta registrada. @endif</a></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                        <form class="d-inline" method="POST" action="{{route('cadastro.destroy', [$processo->id])}}" onsubmit="return confirm('Isso irá excluir, deseja continuar?')" >
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$processos->links()}}
@endsection
