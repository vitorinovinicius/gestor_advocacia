@extends('adminlte::page')

@section('title', 'Novo cliente ')

@section('content_header')
<link rel="stylesheet" href="{{url('css/app.css')}}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <h1>
            Adicionar cliente
        <a href="{{route('cadastro.index')}}" class="btn btn-sm btn-success">
        <i class="fas fa-reply"></i>
            Voltar
        </a>
    </h1>
@endsection

@section('content')
<style type="text/css">
    .cadastro{
        display:none;
    }
</style>
    <form action="{{ route('cadastro.store') }}" method="POST" >
        @csrf
        <!-- BOTÕES DO COLLAPSE PF E PJ-->
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="cliente" value="natural">
            <label class="form-check-label">
                Pessoa natural
            </label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="cliente" value="juridica">
            <label class="form-check-label">
                Pessoa jurídica
            </label>
        </div>
        <!-- FIM BOTÕES DO COLLAPSE PF E PJ-->

        <!-- INÍCIO DO COLLAPSE PF -->
            <div class="card cadastro natural">
                <div class="card-header">
                    <strong>PESSOA NATURAL</strong>
                </div>
                <div class="card-body col-12">
                    <p class="card-text">
                    <div class="row">
                        <div class="form-group col-6">
                            <input type="text" name="nome" placeholder="Nome completo" class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            <input type="text" name="cpf" placeholder="CPF" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" name="pis" placeholder="PIS" class="form-control @error('pis') is-invalid @enderror">
                            @error('pis')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                                @enderror
                        </div>

                        <div class="form-group col-sm-3">
                            <input class="form-control @error('numCtps') is-invalid @enderror" placeholder="Número da CTPS" type="text" name="numCtps" >
                            @error('numCtps')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                                @enderror
                        </div>

                        <div class="form-group col-sm-2">
                            <input class="form-control @error('serieCtps') is-invalid @enderror" placeholder="Série" type="text" name="serieCtps">
                                @error('serieCtps')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                                @enderror
                        </div>

                        <div class="form-group input-group col-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="profissao">Profissão</label>
                            </div>
                            <select name="profissao_id" class="custom-select" id="profissao">
                            <option selected></option>
                            @foreach($profissoes as $profissao)
                            <option>{{$profissao->tipo}}</option>
                            @endforeach
                            </select>

                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Título de eleitor" name="tituloEleitor" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Identidade (RG)" name="idtCivil" class="form-control">
                        </div>

                        <div class="form-group input-group col-4">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="orgExpeditor">Orgão expeditor</label>
                            </div>
                            <select name="orgExpeditor" class="custom-select" id="orgExpeditor">
                                <option selected></option>
                                @foreach($orgexpeditores as $orgExpeditor)
                                <option>{{$orgExpeditor->tipo}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-2" align="right">
                        <strong>Data de expedição </strong>
                        </div>

                        <div class="form-group col-sm-2">
                            <input type="date" placeholder="Data de expedição" name="dtExpedicao" class="form-control">
                        </div>

                        <div class="form-group input-group col-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="sexo">Sexo</label>
                            </div>
                            <select name="sexo" class="custom-select" id="sexo">
                                <option selected></option>
                                <option>Masculino</option>
                                <option>Feminino</option>
                            </select>
                        </div>

                        <div class="form-group input-group col-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="estadoCivil">Estado civil</label>
                            </div>
                            <select name="estadoCivil" class="custom-select" id="estadoCivil">
                                <option selected></option>
                                @foreach($estadoscivis as $estadocivil)
                                <option>{{$estadocivil->tipo}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group input-group col-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="tratamento">Tratamento</label>
                            </div>
                            <select name="tratamento" class="custom-select" id="tratamento">
                                <option selected></option>
                                @foreach($tratamentos as $tratamento)
                                <option>{{$tratamento->tipo}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group input-group col-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="nacionalidade">Nacionalidade</label>
                            </div>
                            <select name="nacionalidade" class="custom-select" id="nacionalidade">
                                <option selected></option>
                                @foreach($nacionalidades as $nacionalidade)
                                <option>{{$nacionalidade->tipo}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-2" align="right">
                        <strong>Data de expedição </strong>
                        </div>
                        <div class="form-group col-sm-3">
                            <input type="date" name="dtNascimento" class="form-control">
                        </div>

                        <div class="form-group col-sm-6">
                            <input type="text" placeholder="Nome da mãe" name="nomeMae" class="form-control">
                        </div>
                    </div>
                </div>
            </div><!-- FIM DO COLLAPSE PF -->

        <!-- INÍCIO DO COLLAPSE PJ -->
        <div class="card cadastro juridica">
            <div class="card-header">
                <strong>PESSOA JURÍDICA</strong>
            </div>
            <div class="card-body col-12">
                <p class="card-text">
                <div class="row">
                    <div class="form-group col-9">
                        <input type="text" name="nome_empresa" placeholder="Razão social" class="form-control @error('nome_empresa') is-invalid @enderror">
                            @error('nome_empresa')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                            @enderror
                    </div>

                    <div class="form-group col-sm-3">
                        <input type="text" name="número" placeholder="Número CNPJ" class="form-control @error('cnpj') is-invalid @enderror">
                            @error('cnpj')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                            @enderror
                    </div>

                    <div class="form-group col-sm-5">
                        <input type="text" name="inscMunicipal" placeholder="Inscrição Municipal" class="form-control">
                        @error('pis')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                            @enderror
                    </div>

                    <div class="form-group col-sm-5">
                        <input type="text" name="inscEstadual" placeholder="Inscrição Estadual" class="form-control" >
                        @error('numCtps')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                            @enderror
                    </div>

                    <div class="form-group col-sm-2">
                        <input class="form-control form-control" placeholder="Código" type="text" name="codigo">
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM DO COLLAPSE PJ -->

        <!-- INÍCIO DO CARD ENDEREÇO -->
        <div class="card">
            <div class="card-header">
                <strong>ENDEREÇO</strong>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <input type="text"  placeholder="CEP" name="cep" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Logradouro" name="logradouro" class="form-control">
                        </div>

                        <div class="form-group col-1">
                            <input class="form-control form-control" placeholder="Número" type="text" name="numEndereco">
                        </div>

                        <div class="form-group col-5">
                            <input class="form-control form-control" placeholder="Complemento" type="text" name="complemento">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" placeholder="Bairro" name="bairro" class="form-control">
                        </div>

                        <div class="form-group input-group col-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="cidade">Cidade</label>
                            </div>
                            <select name="cidade" class="custom-select" id="cidade">
                                <option selected></option>
                                @foreach($cidades as $cidade)
                                <option>{{$cidade}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group input-group col-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="estado">Estado</label>
                            </div>
                            <select name="estado" class="form-group custom-select" id="estado">
                                <option selected></option>
                                @foreach($estados as $estado)
                                <option>{{$estado->uf}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </p>
            </div>
        <!-- FIM DO CARD ENDEREÇO -->

        <!-- INÍCIO DO CARD CONTATO -->
            <div class="card-header">
                <strong>CONTATO</strong>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="E-mail" name="email" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Telefone" name="telefone" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Celular" name="celular" class="form-control">
                        </div>
                    </div>
                </p>
            </div>
        <!-- FIM DO CARD CONTATO -->
        </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cliente" value="parte_contraria">
                <label class="form-check-label">
                    Parte contrária
                </label>
            </div> <!-- FIM BOTÃO COLLAPSE PARTE CONTRÁRIA -->

            <div class="card cadastro parte_contraria">
                <div class="card-header">
                    <strong>PARTE CONTRÁRIA</strong>
                </div>
                <div class="card-body col-12">
                    <p class="card-text">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="text"  placeholder="Nome da parte contrária" name="parteContraria" class="form-control">
                        </div>
                        <div class="form-group col-sm-4">
                            <input type="text"  placeholder="Pasta" name="pasta" class="form-control">
                        </div>

                        <div class="form-group col-sm-2">
                            <input type="text"  placeholder="Número da Inicial" name="numInicial" class="form-control">
                        </div>

                        <div class="form-group col-sm-2">
                            <input type="text"  placeholder="Número Principal" name="numPrincipal" class="form-control">
                        </div>

                        <div class="form-group col-sm-2">
                            <input type="text"  placeholder="Número do Processo" name="numProcesso" class="form-control">
                        </div>

                        <div class="form-group col-sm-2">
                            <input type="date"  placeholder="Data de Distribuição" name="dtDistribuicao" class="form-control">
                        </div>

                        <div class="form-group col-sm-6">
                            <input type="text"  placeholder="Advogado da parte contrária" name="advContraria" class="form-control">
                        </div>

                        <div class="form-group col-sm-12">
                            <textarea class="form-control"type="text"  placeholder="Título" name="titulo"></textarea>
                        </div>
                    </div>
                </div>
            </div> <!-- FIM DO COLLAPSE PARTE CONTRÁRIA -->
        </div>

    <!-- INÍCIO DO MODAL GERADOR DE DOCUMENTOS-->
        <div class="modal fade" id="documentos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="documentos" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="documentos">GERADOR DE DOCUMENTOS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="" id="honorarios">
                            <label class="form-check-label" for="honorarios">
                                Contrato de honorários
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="" id="procuracao">
                            <label class="form-check-label" for="procuracao">
                                Procuração
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="" id="decHipo">
                            <label class="form-check-label" for="decHipo">
                                Declaração de hipossuficiência
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="" id="decRisc">
                            <label class="form-check-label" for="decRisc">
                                Declaração de risco
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="" id="soliDocs">
                            <label class="form-check-label" for="soliDocs">
                                Solicitação de documentos
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div><!-- FIM DO MODAL GERADOR DE DOCUMENTOS-->
        <div class="col-sm-12" align="left">
            <a data-toggle="modal" data-target="#documentos" href="">Gerar documentos</a> <!-- BOTÃO MODAL GERAR DOCUMENTOS -->
        </div>

        <div class="form-group"> <!-- BOTÃO SUBMIT DO FORM -->
            <div class="col-sm-12" align="right">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </div>
    </form>
    <script type="text/javascript" src="../../../../node_modules/mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="radio"]').click (function() {
                var inputValue = $(this).attr("value");
                var targetBox = $("."+ inputValue);
                $(".cadastro").not(targetBox).hide();
                $(targetBox).show();
            })
        })
    </script>
@endsection

