@extends('adminlte::page')

@section('title', 'Configurações')

@section('content_header')
    <h1>Configurações</h1>
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

    @if(session('warning'))
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                ×
            </button>
            {{session('warning')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{route('config.save')}}" method="post" class="form-horizontal">
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Título do sistema</label>
                    <div class="col-sm-10">
                        <input type="text" name="titulo" placeholder="{{$configuracoes['titulo']}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sub-título do sistema</label>
                    <div class="col-sm-10">
                        <input type="text" name="sub-titulo" placeholder="{{$configuracoes['sub-titulo']}}" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail para contato</label>
                    <div class="col-sm-10">
                        <input type="email" name="e-mail" placeholder="{{$configuracoes['e-mail']}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cor fundo</label>
                    <div class="col-sm-10">
                        <input type="color" name="bgcolor" value="{{$configuracoes['bgcolor']}}" class="form-control" style="width:50px">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cor do texto</label>
                    <div class="col-sm-10">
                        <input type="color" name="textcolor" value="{{$configuracoes['textcolor']}}" class="form-control" style="width:50px">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-sm btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
