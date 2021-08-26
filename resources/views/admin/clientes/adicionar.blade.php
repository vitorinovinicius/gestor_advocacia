@extends('adminlte::page')

@section('title', 'Novo cliente ')

@section('content_header')
<link rel="stylesheet" href="{{url('css/card_pf_pj.css')}}">
<script type="text/javascript" src="{{url('js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/mask_number.js')}}"></script>

    <h1>
            Adicionar cliente
        <a href="{{route('cadastro.index')}}" class="btn btn-sm btn-success">
        <i class="fas fa-reply"></i>
            Voltar
        </a>
    </h1>
@endsection

@section('content')
    <form action="{{ route('cadastro.store') }}" method="POST" onsubmit="return confirm('Verique todos os campos antes de salvar!')" >
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
                <div class="card-header bg-light">
                    <strong>PESSOA NATURAL</strong>
                </div>
                <div class="card-body col-12">
                    <p class="card-text">
                    <div class="row">
                        <div class="form-group col-6">
                            <input type="text" name="nome" placeholder="Nome completo" class="form-control required">
                        </div>
                        <div class="form-group col-sm-3">
                            <input type="text" id="cpf" name="cpf" placeholder="CPF" class="form-control" autocomplete="off" maxlength="14" onkeyup="mascara_cpf()">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" id="pis" name="pis" placeholder="PIS" class="form-control" autocomplete="off" maxlength="14" onkeyup="mascara_pis()">
                        </div>

                        <div class="form-group col-sm-2">
                            <input placeholder="Número da CTPS" type="text" name="numCtps" class="form-control" autocomplete="off" maxlength="7">
                        </div>

                        <div class="form-group col-sm-1">
                            <input placeholder="Série" type="text" id="serie_ctps" name="serieCtps" class="form-control" maxlength="5" onkeyup="mascara_serie_ctps()">
                        </div>
                        <div class="form-group input-group col-2">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="uf_ctps">UF</label>
                            </div>
                            <input name="ufCtps" class="custom-select" id="uf_ctps" list="uf_ctpsOptions">
                            <datalist id="uf_ctpsOptions">
                            <option selected></option>
                            @foreach($estados as $uf)
                            <option>{{$uf->uf}}</option>
                            @endforeach
                            </datalist>
                        </div>

                        <div class="form-group input-group col-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="profissao">Profissão</label>
                            </div>
                            <input name="profissao" class="custom-select" id="profissao" list="ProfissaoOptions">
                            <datalist id="ProfissaoOptions">
                            <option selected></option>
                            @foreach($profissoes as $profissao)
                            <option>{{$profissao->tipo}}</option>
                            @endforeach
                            </datalist>

                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Título de eleitor" id="titulo_eleitor" name="tituloEleitor" class="form-control" autocomplete="off" maxlength="19" onkeyup="mascara_titulo_eleitor()">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Identidade (RG)" id="rg" name="idtCivil" class="form-control" autocomplete="off" maxlength="13" onkeyup="mascara_rg()">
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
                        <strong>Data de Nascimento </strong>
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
            <div class="card-header bg-light">
                <strong>PESSOA JURÍDICA</strong>
            </div>
            <div class="card-body col-12">
                <p class="card-text">
                <div class="row">
                    <div class="form-group col-9">
                        <input type="text" name="nome_empresa" placeholder="Razão social" class="form-control required">
                    </div>

                    <div class="form-group col-sm-3">
                        <input type="text" id="cnpj" name="numero" placeholder="Número CNPJ" class="form-control" maxlength="18" onkeyup="mascara_cnpj()">
                    </div>

                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal" placeholder="Inscrição Municipal" class="form-control">
                    </div>

                    <div class="form-group col-sm-4">
                        <input type="text" name="inscEstadual" placeholder="Inscrição Estadual" class="form-control" >
                    </div>

                    <div class="form-group col-sm-2">
                        <input class="form-control form-control" placeholder="Código" type="text" name="codigo">
                    </div>
                    <div class="form-group input-group col-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="natureza">Natureza</label>
                        </div>
                        <input name="natureza_pj" class="custom-select" id="natureza" list="NaturezaOptions" autocomplete="off">
                            <datalist id="NaturezaOptions">
                                <option selected></option>
                                @foreach($naturezas_juridicas as $natureza)
                                <option>{{$natureza->sigla}}</option>
                                @endforeach
                            </datalist>
                    </div>

                    <div class="form-group col-sm-4">
                        <input type="text" name="pasta" placeholder="Pasta do Processo" class="form-control" >
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM DO COLLAPSE PJ -->

        <!-- INÍCIO DO CARD ENDEREÇO -->
        <div class="card">
            <div class="card-header bg-light">
                <strong>ENDEREÇO</strong>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <input type="text"  placeholder="Insira o CEP." name="cep" id="cep" class="form-control" autocomplete="off" maxlength="9">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Logradouro" name="logradouro" id="rua" class="form-control">
                        </div>

                        <div class="form-group col-1">
                            <input placeholder="Número" type="text" name="numEndereco" class="form-control">
                        </div>

                        <div class="form-group col-3">
                            <input placeholder="Complemento"  type="text" name="complemento" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" placeholder="Bairro" name="bairro" id="bairro" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" placeholder="Cidade" name="cidade" id="cidade" class="form-control">
                        </div>

                        <div class="form-group col-sm-1">
                            <input type="text" placeholder="Estado" name="uf" id="uf" class="form-control">
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
                            <input type="email" placeholder="E-mail" name="email" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" id="telefone" placeholder="Telefone" name="telefone" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" id="celular" placeholder="Celular" name="celular" class="form-control" maxlength="15" onkeyup="mascara_celular()">
                        </div>
                    </div>
                </p>
            </div>
        <!-- FIM DO CARD CONTATO -->
        </div>

        <div class="form-group"> <!-- BOTÃO SUBMIT DO FORM -->
            <div class="col-sm-12" align="right">
                <input type="submit" class="btn btn-success" value="Cadastrar">
            </div>
        </div>
    </form>

    <script src="{{url('js/botao_pf_pj.js')}}"></script>
    <script src="{{url('js/viacep_cliente.js')}}"></script>
    <script src="{{url('js/viacep_parte_contraria.js')}}"></script>

@endsection


