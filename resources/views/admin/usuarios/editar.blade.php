@extends('adminlte::page')

@section('title', 'Editar usuário')

@section('content_header')

    <h1>Editar usuário</h1>

@endsection

@section('content')
    <div class="card col-sm-8">
        <div class="card-body">
            <form action="{{ route('usuarios.update', ['usuario' => $usuario->id])}}" class="form-horizontal" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nome completo</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" placeholder="{{$usuario->name}}" class="form-control @error('name') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">E-mail</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" placeholder="{{$usuario->email}}" class="form-control @error('email') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nova senha</label>
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
                        <input type="submit" name="Salvar" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
