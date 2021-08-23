
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
@if(count($processos) <= 0)
<div class="container-fluid" align="center">
    <div class="col-lg-3 col-6">
        <div class="card bg-warning">
            <div class="inner">
                <h3><i class="fas fa-exclamation-triangle"></i></h3>
                <p>Não há processos cadastrados.</p>
            </div>
            <div class="small-box-footer"></div>
        </div>
    </div>
</div>
@else
<div class="card col-12">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="100px">Ordem</th>
                    <th width="600px">@if(count($processos) <= 1)Processo @else Processos @endif</th>
                    <th width="200px">Clientes</th>
                    <th width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($processos as $processo)
                <tr>
                    <td>{{$processo->id}}</td>
                    <td><a href="{{route('processo.show', [$processo->id])}}">{{$processo->pasta}}</a></td>
                    <td>@if(array($processo) > 0){{count($processo->cliente)}} @else Não há clientes registrados. @endif</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                        <form class="d-inline" method="POST" action="{{route('processo.destroy', $processo->id)}}" onsubmit="return confirm('Isso irá excluir, deseja continuar?')" >
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
    </div>
</div>
@endif
@endsection
