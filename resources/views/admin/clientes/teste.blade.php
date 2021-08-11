@extends('adminlte::page')

@section('title', 'TESTE')

@section('content_header')

    <h1>Novo teste</h1>

@endsection

@section('content')

@if($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>
        <ul>
            <h4><i class="icon fas fa-ban"></i> Ocorreu um erro. </h4>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card col-sm-8">
    <div class="card-body">
        <form action="{{ route('cadastro.store')}}" class="form-horizontal" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nome completo</label>
                <div class="col-sm-8">
                    <input type="text" name="nome" value="{{old('nome')}}" class="form-control @error('nome') is-invalid @enderror">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">CPF</label>
                <div class="col-sm-8">
                    <input type="text" name="cpf" value="{{old('cpf')}}" class="form-control @error('cpf') is-invalid @enderror">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Profissão</label>
                <div class="col-sm-8">
                    <input type="text" name="profissao_id" class="form-control @error('profissao_id') is-invalid @enderror">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-6">
                    <input type="submit" name="Cadastrar" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
