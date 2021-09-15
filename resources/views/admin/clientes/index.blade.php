@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')

@section('css')
    <link rel="stylesheet" href="{{url('css/app.css')}}">
@endsection

    <h1>
        Meus clientes
        <a href="{{route('cadastro.create')}}" class="btn btn-sm btn-success">
        <i class="fas fa-user-plus"></i> Novo cliente
        </a>
    </h1>
@endsection
@section('content')
@if(!isset($clientes))
<div align="center">
    <div class="col-lg-4 col-4">
        <div class="small-box bg-warning">
            <div class="inner">
                <h1>Não há clientes cadastrados.</h1>
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
        <table id="clientes" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th class="col-4">Nome / Razão social</th>
                    <th class="col-3">CPF / CNPJ</th>
                    <th class="col-3">Processo / Serviço</th>
                    <th class="col-1">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>
                        @if(isset($cliente->nome) > 0)<i class="fas fa-user"></i>
                        @elseif(isset($cliente->nome_empresa) > 0)<i class="fas fa-building"></i>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('cadastro.show', $cliente->id)}}">
                        @if(isset($cliente->nome) > 0){{$cliente->nome}}
                        @elseif (isset($cliente->nome_empresa) > 0) {{$cliente->nome_empresa}} ({{$cliente->pessoaJuridica->natureza_pj}})
                        @endif
                        </a>
                    </td>
                    @if(!empty($cliente->nome || $cliente->nome_empresa) > 0)
                    <td>
                        @if(!empty($cliente->pessoaJuridica->numero) > 0){{ $cliente->pessoaJuridica->numero }}
                        @elseif(!empty($cliente->pessoaFisica->cpf) > 0){{ $cliente->pessoaFisica->cpf }}
                        @elseif(empty($cliente->pessoaFisica->cpf)) Não há dados cadastros.
                        @endif
                    </td>
                    @else
                    <td>Não há dados cadastros.</td>
                    @endif

                    <td>
                        @if (!empty($cliente->processo) > 0)
                        {{'Processos: '.$cliente->processo->count('cliente_processo')}}
                        @if ($cliente->servico)
                        | {{'Serviços: '.$cliente->servico->count('servico_cliente')}}
                        @else
                        @endif
                        @endif

                    </td>

                    <td>
                        <a href="{{route('cadastro.edit', $cliente->id)}}" class="btn btn-sm btn-warning">Editar</a>
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
        $('#clientes').DataTable( {
            info: false

        } );
    } );
    </script>
@endsection
