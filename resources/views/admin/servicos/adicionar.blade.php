@extends('adminlte::page')

@section('title', 'Novo serviço')

@section('content_header')
@section('css')
    <link rel="stylesheet" href="{{url('css/app.css')}}">
@endsection
    <h1>
        Novo serviço
        <a href="{{route('processo.index')}}" class="btn btn-sm btn-success">
            Voltar
        </a>
    </h1>
@endsection

@section('content')
<form action="{{ route('servico.store') }}" method="POST" class="add_cliente">
    @csrf     
    <div class="card">
        <div class="card-header">
            <strong>PASTA DO SERVIÇO</strong>
        </div>
        <div class="card-body col-12">
            <p class="card-text">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <input type="text"  placeholder="Nome da pasta" name="pastaServico" class="form-control">
                    </div>

                    <div class="form-group col-sm-4">
                        <input type="text"  placeholder="Pasta" name="pasta" class="form-control">
                    </div>

                    <div class="form-group col-sm-2">
                        <input type="text"  placeholder="Número da Inicial" name="numInicial" class="form-control">
                    </div>

                    <div class="form-group col-sm-2">
                        <input type="text"  placeholder="Número Principal" name="numPrincipal" class="form-control">
                    </div>

                    <div class="form-group col-sm-2">
                        <input type="text"  placeholder="Número do Processo" name="numProcesso" class="form-control">
                    </div>

                    <div class="form-group col-sm-2">
                        <input type="date"  placeholder="Data de Distribuição" name="dtDistribuicao" class="form-control">
                    </div>

                    <div class="form-group col-sm-6">
                        <input type="text"  placeholder="Advogado da parte contrária" name="advContraria" class="form-control">
                    </div>

                    <div class="form-group col-sm-12">
                        <textarea class="form-control"type="text"  placeholder="Título" name="titulo"></textarea>
                    </div>
                </div>
            </p>
        </div>
    </div>
</form>           
@endsection
