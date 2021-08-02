@extends('adminlte::page')

@section('title', 'Novo cliente ')

@section('content_header')
    <h1>Novo cliente</h1>
@endsection
@section('content')

<form action="{{route('cadastro.store')}}" method="post" class="form-horizontal">
        @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nome completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">CPF</label>
                    <div class="col-sm-10">
                        <input type="text" name="cpf" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">PIS</label>
                    <div class="col-sm-10">
                        <input type="text" name="pis" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Profissão</label>
                    <div class="col-sm-10">
                        <input type="text" name="profissao" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Sexo</label>
                    <div class="col-sm-10">
                        <input type="text" name="sexo" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Estado Cívil</label>
                    <div class="col-sm-10">
                        <input type="text" name="estadoCivil" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Tratamento</label>
                    <div class="col-sm-10">
                        <input type="text" name="tratamento" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <label class="col-sm-4 control-label">Número da CTPS</label>
                            <div class="col-12">
                                <input class="form-control form-control" type="text" name="numCtps" >
                            </div>
                        <small class="form-text text-muted col-sm-12">Digite os números da CTPS</small>
                    </div>
                    <div class="col-4">
                        <label class="col-sm-4 control-label">Série</label>
                            <div class="col-6">
                                <input class="form-control form-control" type="text" name="serieCtps">
                            </div>
                        <small class="form-text text-muted col-sm-6">Número de série</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nacionalidade</label>
                        <div class="col-sm-10">
                            <input type="text" name="nacionalidade" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Data de Nascimento</label>
                        <div class="col-sm-10">
                            <input type="text" name="dtNascimento" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Titulo de Eleitor</label>
                        <div class="col-sm-10">
                            <input type="text" name="tituloEleitor" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Identidade Cívil</label>
                        <div class="col-sm-10">
                            <input type="text" name="idtCivil" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Data de Expedição</label>
                        <div class="col-sm-10">
                            <input type="text" name="dtExpedicao" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Orgão expeditor</label>
                        <div class="col-sm-10">
                            <input type="text" name="orgExpeditor" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nome da mãe</label>
                        <div class="col-sm-10">
                            <input type="text" name="nomeMae" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" value="Cadastrar" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
