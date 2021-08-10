@extends('adminlte::page')

@section('title', 'Novo cliente ')

@section('content_header')
<link rel="stylesheet" href="{{url('/css/app.css')}}">
    <h1>
        Adicionar cliente
        <a href="{{route('cadastro.index')}}" class="btn btn-sm btn-success">
        <i class="fas fa-reply"></i> Voltar
        </a>
    </h1>
@endsection

@section('content')

<form action="{{route('cadastro.store')}}" method="post" >
    @csrf
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#pessoaFisica" aria-expanded="false" aria-controls="pessoaFisica">
            Pessoa natural
        </button>

        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#pessoaJuridica" aria-expanded="false" aria-controls="pessoaJuridica">
            Pessoa jurídica
        </button>
    </p>
    <div class="collapse col-12" id="pessoaFisica">
        <div class="card card-body">
            <div class="row">
                <div class="col-6">
                    <input type="text" name="nome" placeholder="Nome completo" class="form-control @error('nome') is-invalid @enderror">
                        @error('nome')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                        @enderror
                </div>
                <div class="col-sm-3">
                    <input type="text" name="cpf" placeholder="CPF" class="form-control @error('cpf') is-invalid @enderror">
                        @error('cpf')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                        @enderror
                </div>

                <div class="col-sm-3">
                    <input type="text" name="pis" placeholder="PIS" class="form-control @error('pis') is-invalid @enderror">
                    @error('pis')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                        @enderror
                </div>

                <div class="col-sm-3">
                    <input class="form-control @error('numCtps') is-invalid @enderror" placeholder="Número da CTPS" type="text" name="numCtps" >
                    @error('numCtps')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                        @enderror
                </div>

                <div class="col-sm-2">
                    <input class="form-control @error('serieCtps') is-invalid @enderror" placeholder="Série" type="text" name="serieCtps">
                        @error('serieCtps')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                        @enderror
                </div>

                <div class="input-group col-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="profissao">Profissão</label>
                    </div>
                    <select name="profissao" class="custom-select" id="profissao">
                        <option selected></option>
                    </select>
                </div>

                <div class="col-sm-4">
                    <input type="text" placeholder="Título de eleitor" name="tituloEleitor" class="form-control">
                </div>

                <div class="col-sm-4">
                    <input type="text" placeholder="Identidade (RG)" name="idtCivil" class="form-control">
                </div>

                <div class="col-sm-4">
                    <input type="text" placeholder="Orgão expeditor" name="orgExpeditor" class="form-control">
                </div>

                <div class="col-sm-4">
                    <input type="date" placeholder="Data de expedição" name="dtExpedicao" class="form-control">
                </div>

                <div class="input-group col-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="sexo">Sexo</label>
                    </div>
                    <select name="sexo" class="custom-select" id="sexo">
                        <option selected></option>
                    </select>
                </div>

                <div class="input-group col-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="estadoCivil">Estado civil</label>
                    </div>
                    <select name="estadoCivil" class="custom-select" id="estadoCivil">
                        <option selected></option>
                    </select>
                </div>

                <div class="input-group col-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="tratamento">Tratamento</label>
                    </div>
                    <select name="tratamento" class="custom-select" id="tratamento">
                        <option selected></option>
                    </select>
                </div>

                <div class="input-group col-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="nacionalidade">Nacionalidade</label>
                    </div>
                    <select name="nacionalidade" class="custom-select" id="nacionalidade">
                        <option selected></option>
                    </select>
                </div>

                <div class="col-sm-5">
                    <input type="date" name="dtNascimento" class="form-control">
                </div>

                <div class="col-sm-6">
                    <input type="text" placeholder="Nome da mãe" name="nomeMae" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="collapse col-12" id="pessoaJuridica">
        <div class="card card-body">
            <div class="row">
            <div class="col-9">
                    <input type="text" name="nome" placeholder="Razão social" class="form-control @error('nome_empresa') is-invalid @enderror">
                        @error('nome_empresa')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                        @enderror
                </div>

                <div class="col-sm-3">
                    <input type="text" name="número" placeholder="Número CNPJ" class="form-control @error('cnpj') is-invalid @enderror">
                        @error('cnpj')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                        @enderror
                </div>

                <div class="col-sm-5">
                    <input type="text" name="inscEstadual" placeholder="Inscrição Municipal" class="form-control">
                    @error('pis')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                        @enderror
                </div>

                <div class="col-sm-5">
                    <input type="text" name="inscEstadual" placeholder="Inscrição Estadual" class="form-control" >
                    @error('numCtps')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                        @enderror
                </div>

                <div class="col-sm-2">
                    <input class="form-control form-control" placeholder="Código" type="text" name="codigo">
                </div>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
        <strong>ENDEREÇO</strong>
        </div>
        <div class="card-body">
            <p class="card-text">
                <div class="row">
                    <div class="col-sm-2">
                        <input type="text"  placeholder="CEP" name="cep" class="form-control">
                    </div>

                    <div class="col-sm-4">
                        <input type="text" placeholder="Logradouro" name="logradouro" class="form-control">
                    </div>

                    <div class="col-1">
                        <input class="form-control form-control" placeholder="Número" type="text" name="numEndereco">
                    </div>

                    <div class="col-5">
                        <input class="form-control form-control" placeholder="Complemento" type="text" name="complemento">
                    </div>

                    <div class="col-sm-3">
                        <input type="text" placeholder="Bairro" name="bairro" class="form-control">
                    </div>

                    <div class="col-sm-4">
                        <input type="text" placeholder="Cidade" name="cidade" class="form-control">
                    </div>

                    <div class="input-group col-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Estado</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected></option>
                        </select>
                    </div>

                </div>
            </p>
        </div>

        <div class="card-header">
            <strong>CONTATO</strong>
        </div>
        <div class="card-body">
            <p class="card-text">
                <div class="row">
                    <div class="col-sm-4">
                        <input type="text" placeholder="E-mail" name="email" class="form-control">
                    </div>

                    <div class="col-sm-4">
                        <input type="text" placeholder="Telefone" name="telefone" class="form-control">
                    </div>

                    <div class="col-sm-4">
                        <input type="text" placeholder="Celular" name="celular" class="form-control">
                    </div>
                </div>
            </p>
        </div>
        </div>
        <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#processo" aria-expanded="false" aria-controls="processo">
                Parte contrária
            </button>
        </p>
        <div class="collapse col-12" id="processo">
            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text"  placeholder="Nome da parte contrária" name="parteContraria" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text"  placeholder="Pasta" name="pasta" class="form-control">
                    </div>

                    <div class="col-sm-2">
                        <input type="text"  placeholder="Número da Inicial" name="numInicial" class="form-control">
                    </div>

                    <div class="col-sm-2">
                        <input type="text"  placeholder="Número Principal" name="numPrincipal" class="form-control">
                    </div>

                    <div class="col-sm-2">
                        <input type="text"  placeholder="Número do Processo" name="numProcesso" class="form-control">
                    </div>

                    <div class="col-sm-2">
                        <input type="date"  placeholder="Data de Distribuição" name="dtDistribuicao" class="form-control">
                    </div>

                    <div class="col-sm-6">
                        <input type="text"  placeholder="Advogado da parte contrária" name="advContraria" class="form-control">
                    </div>

                    <div class="col-sm-12">
                        <textarea class="form-control"type="text"  placeholder="Título" name="titulo"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label"></label>
        <div class="col-sm-10">
            <input type="submit" value="Cadastrar" class="btn btn-success">
        </div>
    </div>
</form>

@endsection
