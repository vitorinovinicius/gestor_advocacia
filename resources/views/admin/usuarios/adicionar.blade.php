@extends('adminlte::page')

@section('title', 'Novo usuário')

@section('content_header')

    <h1>Novo usuário</h1>

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
        <form action="{{ route('usuarios.store')}}" class="form-horizontal" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nome completo</label>
                <div class="col-sm-8">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">E-mail</label>
                <div class="col-sm-8">
                    <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Senha</label>
                <div class="col-sm-8">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Repita a senha</label>
                <div class="col-sm-8">
                    <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror">
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
