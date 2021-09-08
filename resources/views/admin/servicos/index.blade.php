
@extends('adminlte::page')

@section('title', 'Serviço')

@section('content_header')
    <h1>
        Meus serviços
        <a href="{{route('servico.create')}}" class="btn btn-sm btn-success">
            Novo servico
        </a>
    </h1>
@endsection
@section('content')
@if(count(array($servicos)) <= 0)
<div align="center">
    <div class="col-lg-4 col-4">
        <div class="small-box bg-warning">
            <div class="inner">
                <h1>Não há servico cadastrados.</h1>
            </div>
            <div class="icon">
                <i class="fas fa-exclamation-triangle">
                </i>
            </div>
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
                    <th width="600px">@if(count($servicos) <= 1)Serviço @else Serviços @endif</th>
                    <th width="200px">Clientes</th>
                    <th width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicos as $servico)
                <tr>
                    <td>{{$servico->id}}</td>
                    <td><a href="{{route('servico.show', [$servico->id])}}">{{$servico->pasta_servico}}</a></td>
                    <td>@if(isset($servico->cliente) > 0){{count($servico->cliente) > 0}} @if(count($servico->cliente) === 0)Não há cliente registrado. @endif @endif</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                        <form class="d-inline" method="POST" action="{{route('servico.destroy', $servico->id)}}" onsubmit="return confirm('Isso irá excluir, deseja continuar?')" >
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$servicos->links()}}
    </div>
</div>
@endif
@endsection
