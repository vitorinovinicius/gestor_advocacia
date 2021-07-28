@extends('adminlte::page')

@section('title', 'Nova página')

@section('content_header')

    <h1>Nova página</h1>

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
    <div class="card">
        <div class="card-body">
            <form action="{{ route('paginas.store')}}" class="form-horizontal" method="POST">
                @csrf

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Título</label>
                    <div class="col-sm-8">
                        <input type="text" name="titulo" value="{{old('titulo')}}" class="form-control @error('titulo') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Corpo</label>
                    <div class="col-sm-8">
                        <textarea name="corpo" class="form-control bodyfield">{{old('corpo')}}</textarea>
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
