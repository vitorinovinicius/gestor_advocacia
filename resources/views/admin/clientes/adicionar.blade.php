@extends('adminlte::page')

@section('title', 'Novo cliente ')

@section('content_header')
    <h1>
        Adicionar cliente
        <a href="{{route('cadastro.index')}}" class="btn btn-sm btn-success">
        <i class="fas fa-reply"></i> Voltar
        </a>
    </h1>
@endsection


<style>
    .scroll-me{
    overflow-y: auto;
    overflow-x: hidden;
}
::-webkit-scrollbar{
    background-color: white;
    width: 10px;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}
::-webkit-scrollbar-thumb{
    background-color: gray;
    border-radius: 10px;
}

.card{
    border-radius: 10px;
}

</style>
@section('content')
<?php
$cep = '25213310';
$url = "https://viacep.com.br/ws/{$cep}/json/";
$endereco = json_decode(file_get_contents($url));
?>
<form action="{{route('cadastro.store')}}" method="post" class="form-horizontal">
        @csrf
    <div class="row">
        <div class="col-6">
        <label class="col-sm-4 control-label">DADOS PESSOA NATURAL</label>
            <div class="card scroll-me" style="height: 600px;">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nome completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror">
                        @error('nome')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">CPF</label>
                    <div class="col-sm-10">
                    <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror">
                        @error('cpf')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
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
                    </div>
                    <div class="col-4">
                        <label class="col-sm-4 control-label">Série</label>
                        <div class="col-6">
                            <input class="form-control form-control" type="text" name="serieCtps">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Nacionalidade</label>
                    <div class="col-sm-10">
                        <input type="text" name="nacionalidade" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Data de Nascimento</label>
                    <div class="col-sm-10">
                        <input type="date" name="dtNascimento" class="form-control">
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
                        <input type="date" name="dtExpedicao" class="form-control">
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
            </div>
        </div> <!-- FIM DOS DADOS PESSOA NATURAL -->

        <div class="col-6">
        <label class="col-sm-4 control-label">ENDEREÇO E CONTATOS</label>
            <div class="card scroll-me" style="height: 600px;">
                <div class="card-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">CEP</label>
                        <div class="col-sm-10">
                            <input type="text" name="cep" class="form-control" value="{{$endereco->cep}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Logradouro</label>
                        <div class="col-sm-10">
                            <input type="text" name="logradouro" class="form-control" value="{{$endereco->logradouro}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <label class="col-sm-4 control-label">Complemento</label>
                            <div class="col-12">
                                <input class="form-control form-control" type="text" name="complemento" value="{{$endereco->complemento}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="col-sm-6 control-label">Número</label>
                            <div class="col-5">
                                <input class="form-control form-control" type="text" name="numEndereco">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Bairro</label>
                        <div class="col-sm-10">
                            <input type="text" name="bairro" class="form-control" value="{{$endereco->bairro}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Cidade</label>
                        <div class="col-sm-10">
                            <input type="text" name="cidade" class="form-control" value="{{$endereco->localidade}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Estado</label>
                        <div class="col-sm-10">
                            <input type="text" name="uf" class="form-control" value="{{$endereco->uf}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Telefone</label>
                        <div class="col-sm-10">
                            <input type="text" name="telefone" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Celular</label>
                        <div class="col-sm-10">
                            <input type="text" name="celular" class="form-control">
                        </div>
                    </div> <!-- FIM DOS DADOS ENDEREÇO E CONTATOS-->
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
