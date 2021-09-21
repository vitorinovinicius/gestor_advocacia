
@extends('adminlte::page')

@section('title', 'Processos')

@section('content_header')
@section('css')
    <link rel="stylesheet" href="{{url('css/app.css')}}">
@endsection
    <h1>
        Meus processos
        <a href="{{route('processo.create')}}" class="btn btn-sm btn-success">
            Novo processo
        </a>
    </h1>
@endsection
@section('content')
@if(!isset($processos))
<div align="center">
    <div class="col-lg-4 col-4">
        <div class="small-box bg-warning">
            <div class="inner">
                <h1 align="left">Não há processos cadastrados.</h1>
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
        <table class="table table-hover" id="processos">
            <thead>
                <tr>
                    <th class="col-6">@if(count($processos) <= 1)Pasta do processo @else Pastas dos processos @endif</th>
                    <th class="col-2">Número do processo</th>
                    <th class="col-2">Último andamento</th>
                    <th class="col-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($processos as $processo)
                <tr>
                    <td>
                        <a href="{{route('processo.show', [$processo->id])}}">
                            {{$processo->nome_processo}}
                        </a>
                    </td>
                    <td>
                        @if(isset($processo->numProcesso))
                            {{$processo->numProcesso}}
                        @else
                        Não há registro.
                        @endif

                    </td>
                    <td>
                        {{date('d/m/Y', strtotime($processo->ultAndamento))}}
                    </td>
                    <td>
                        <a href="{{route('processo.edit', [$processo->id])}}" class="btn btn-sm btn-warning">Editar</a>
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
    </div>
</div>
@endif
@endsection
@section('js')
    <script>
    $(document).ready(function() {
        $('#processos').DataTable({
            info: false
        });
    });
    </script>
@endsection
