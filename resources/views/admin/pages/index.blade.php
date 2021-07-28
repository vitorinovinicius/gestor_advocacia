@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>
        Minhas páginas
        <a href="{{ route('paginas.create')}}" class="btn btn-sm btn-success">
            Nova página
        </a>
    </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Título</th>
                    <th width="250">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paginas as $pagina)
                <tr>
                    <td>{{$pagina->titulo}}</td>
                    <td>
                        <a href="" target="_blank" class="btn btn-sm btn-success">Ver</a>
                        <a href="{{ route('paginas.edit', ['pagina' => $pagina->id])}}" class="btn btn-sm btn-warning">Editar</a>

                        <form class="d-inline" method="POST" action="{{ route('paginas.destroy', ['pagina' => $pagina->id])}}" onsubmit="return confirm('Isso irá excluir, deseja continuar?')" >
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
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            {{ $paginas->links()}}
        </ul>

    </div>
</div>


@endsection
