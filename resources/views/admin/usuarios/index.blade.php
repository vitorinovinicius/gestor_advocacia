@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>
        Meus usuários
        <a href="{{ route('usuarios.create')}}" class="btn btn-sm btn-success">
            Novo usuários
        </a>
    </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50px">ID</th>
                    <th width="500px">Nome</th>
                    <th>E-mail</th>
                    <th width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', ['usuario' => $usuario->id])}}" class="btn btn-sm btn-warning">Editar</a>
                        @if($loggedId !== $usuario->id)
                        <form class="d-inline" method="POST" action="{{ route('usuarios.destroy', ['usuario' => $usuario->id])}}" onsubmit="return confirm('Isso irá excluir, deseja continuar?')" >
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            {{ $usuarios->links()}}
        </ul>

    </div>
</div>

@endsection
