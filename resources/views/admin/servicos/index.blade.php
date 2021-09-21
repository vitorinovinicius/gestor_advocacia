
@extends('adminlte::page')

@section('title', 'Serviço')

@section('content_header')
@section('css')
    <link rel="stylesheet" href="{{url('css/app.css')}}">
@endsection
    <h1>
        Meus serviços
        <a href="{{route('servico.create')}}" class="btn btn-sm btn-success">
            Novo serviço
        </a>
    </h1>
@endsection
@section('content')
@if(!isset($servicos))
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
    <div class="card-body table-responsive-sm">
        <table class="table table-hover" id="servicos">
            <thead>
                <tr>
                    <th class="col-sm-7">@if(count($servicos) <= 1)Pasta do serviço @else Pastas dos serviços @endif</th>
                    <th class="col-sm-3">Clientes</th>
                    <th class="col-sm-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicos as $servico)
                <tr>
                    <td><a href="{{route('servico.show', [$servico->id])}}">{{$servico->nome_servico}}</a></td>
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
    </div>
</div>
@endif
@endsection
@section('js')
    <script>
    $(document).ready(function() {
        $('#servicos').DataTable({
            info: false
        });
    });
    </script>
@endsection
