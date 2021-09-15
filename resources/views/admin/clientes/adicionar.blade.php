@extends('adminlte::page')

@section('title', 'Novo cliente ')

@section('content_header')

@section('css')
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/card_pf_pj.css')}}">
@endsection
<script type="text/javascript" src="{{url('js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/mask_number.js')}}"></script>
<script type="text/javascript" src="{{url('js/mascara_processo.js')}}"></script>

    <h1>
            Cadastro inicial do cliente
        <a href="{{route('cadastro.index')}}" class="btn btn-sm btn-success">
        <i class="fas fa-reply"></i>
            Voltar
        </a>
    </h1>
@endsection

@section('content')
    <form action="{{ route('cadastro.store') }}" method="POST" class="add_cliente">
        @csrf
        @php
            date_default_timezone_set('America/Sao_Paulo')
        @endphp
        <!-- BOTÕES DO COLLAPSE PF E PJ-->            
                <ul class="nav nav-tabs col-md-12" role="tablist">
                    <li role="presentation" class="nav-item" >
                        <a class="nav-link active" href="#pessoa_fisica" aria-controls="pessoa_fisica" data-toggle="tab" role="tab">Pessoa Natural</a>
                    </li>

                    <li role="presentation" class="nav-item" >
                        <a class="nav-link" href="#pessoa_juridica" aria-controls="pessoa_juridica" data-toggle="tab" role="tab">Pessoa Jurídica</a>
                    </li>
                </ul>
                <div class="card tab-content table-responsive-sm">
                    <div role="tabpanel" class="tab-pane nav-link active" id="pessoa_fisica">
                        <div class="card-body col-12">
                            <p class="card-text">                        
                                <div class="row">
                                    <div class="form-group col-6">
                                        <input type="text" name="nome" placeholder="Nome completo" class="form-control" maxlength="150" aria-describedby="nome_cliente" autocomplete="off">
                                        <small id="nome_cliente" class="form-text text-muted">Insira o nome completo</small>
                                    </div>
                
                                    <div class="form-group col-sm-3">
                                        <input type="text" name="cpf" placeholder="CPF" id="cpf" class="form-control" maxlength="14" aria-describedby="cpf_cliente" autocomplete="off">
                                        <small id="cpf_cliente" class="form-text text-muted">Insira o número do CPF</small>
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <input type="text" name="pis" placeholder="PIS" id="pis" class="form-control" maxlength="14" aria-describedby="pis_cliente" autocomplete="off">
                                        <small id="pis_cliente" class="form-text text-muted">Insira o número do PIS</small>
                                    </div>
                                
                                    <div class="form-group col-sm-3">
                                        <input type="text" name="numCtps" placeholder="Número CTPS" id="numCtps" class="form-control" maxlength="7" aria-describedby="numCtps_cliente" autocomplete="off">
                                        <small id="numCtps_cliente" class="form-text text-muted">Insira o número da CTPS</small>
                                    </div>
                                
                                    <div class="form-group col-sm-2">
                                        <input type="text" name="serieCtps" placeholder="Série CTPS" id="serieCtps" class="form-control" maxlength="5" aria-describedby="serieCtps_cliente" autocomplete="off">
                                        <small id="serieCtps_cliente" class="form-text text-muted">Insira a série da CTPS</small>
                                    </div>
                                
                                    <div class="form-group col-sm-7">
                                        <input type="text" name="profissao" class="custom-select" id="profissao" list="profissaoOptions" aria-describedby="profissao_cliente" autocomplete="off">
                                        <datalist id="profissaoOptions">
                                            <option selected></option>
                                            @foreach($profissoes as $profissao)
                                            <option>{{$profissao->tipo}}</option>
                                            @endforeach
                                        </datalist>
                                        <small id="profissao_cliente" class="form-text text-muted">Selecione ou insira a profissão</small>
                                    </div>
                                    
                                    <div class="form-group col-sm-3">
                                        <input type="text" name="tituloEleitor" placeholder="Título de eleitor" id="titulo_eleitor" class="form-control" maxlength="19" aria-describedby="titulo_eleitor_cliente" autocomplete="off">
                                        <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira o número do título de eleitor</small>
                                    </div>
                                    
                                    <div class="form-group col-sm-3">
                                        <input type="text" name="idtCivil" placeholder="Identidade Civil" id="rg" class="form-control" maxlength="13" aria-describedby="idtCivil_cliente" autocomplete="off">
                                        <small id="idtCivil_cliente" class="form-text text-muted">Insira o número da Identidade Civil </small>
                                    </div>
                                    
                                    <div class="form-group col-sm-4">
                                        <input type="text" name="orgExpeditor" class="custom-select" id="orgExpeditor" list="orgExpeditorOptions" aria-describedby="orgExpeditor_cliente" autocomplete="off">
                                        <datalist id="orgExpeditorOptions">
                                            <option selected></option>
                                            @foreach($orgExpeditores as $orgExpeditor)
                                            <option>{{$orgExpeditor->tipo}}</option>
                                            @endforeach
                                        </datalist>
                                        <small id="orgExpeditor_cliente" class="form-text text-muted">Selecione o órgão expeditor</small>
                                    </div>

                                    <div class="form-group col-sm-2">
                                        <input type="date" name="dtExpedicao"  class="form-control" aria-describedby="dtExpeditor_cliente">
                                        <small id="dtExpedicao_cliente" class="form-text text-muted">Insira a data de expedição</small>
                                    </div>
                                    
                                    <div class="form-group col-sm-2">
                                        <input type="text" name="sexo" class="custom-select" id="sexo" list="sexoOptions" aria-describedby="sexo_cliente" autocomplete="off">
                                        <datalist id="sexoOptions">
                                            <option selected></option>
                                            <option>Masculino</option>
                                            <option>Feminino</option>
                                        </datalist>
                                        <small id="sexo_cliente" class="form-text text-muted">Selecione o sexo</small>
                                    </div>

                                    <div class="form-group col-sm-2">                                        
                                        <input type="text" name="estadoCivil" class="custom-select" id="estadoCivil" list="estadoCivilOptions" aria-describedby="estado_civil_cliente" autocomplete="off">
                                        <datalist id="estadoCivilOptions">
                                            <option selected></option>
                                            @foreach($estadoscivis as $estadoscivil)
                                            <option>{{$estadoscivil->tipo}}</option>
                                            @endforeach
                                        </datalist>
                                        <small id="estado_civil_cliente" class="form-text text-muted">Selecione o estado civil</small>
                                    </div>

                                    <div class="form-group col-sm-2">
                                        <input type="text" name="tratamento" class="custom-select" id="tratamento" list="tratamentoOptions" aria-describedby="tratamento_cliente" autocomplete="off">
                                        <datalist id="tratamentoOptions">
                                            <option selected></option>
                                            @foreach($tratamentos as $tratamento)
                                            <option>{{$tratamento->tipo}}</option>
                                            @endforeach
                                        </datalist>
                                        <small id="tratamento_cliente" class="form-text text-muted">Selecione o tratamento</small>
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <input type="text" name="nacionalidade" class="custom-select" id="nacionalidade" list="nacionalidadeOptions" aria-describedby="nacionalidade_cliente" autocomplete="off">
                                        <datalist id="nacionalidadeOptions">
                                            <option selected></option>
                                            @foreach($nacionalidades as $nacionalidade)
                                            <option>{{$nacionalidade->tipo}}</option>
                                            @endforeach
                                        </datalist>
                                        <small id="nacionalidade_cliente" class="form-text text-muted">Selecione a nacionalidade</small>
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <input type="date" name="dtNascimento" class="form-control" aria-describedby="data_nascimento_cliente">
                                        <small id="data_nascimento_cliente" class="form-text text-muted">Insira a data de nascimento</small>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <input type="text" name="nomeMae" placeholder="Nome da mãe" class="form-control" maxlength="150" aria-describedby="nome_mae_cliente" autocomplete="off">
                                        <small id="nome_mae_cliente" class="form-text text-muted">Insira o nome completo da mãe</small>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane nav-link" id="pessoa_juridica">
                        <div class="card-body col-12">
                            <p class="card-text">
                            <div class="row">
                                <div class="form-group col-9">
                                    <input type="text" name="nome_empresa" placeholder="Razão social" class="form-control" autocomplete="off">
                                    <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira a razão social da empresa</small>
                                </div>
            
                                <div class="form-group col-sm-3">
                                    <input type="text" id="cnpj" name="numero" placeholder="Número CNPJ" class="form-control" maxlength="18" onkeyup="mascara_cnpj()" autocomplete="off">
                                    <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira o número do CNPJ</small>
                                </div>
            
                                <div class="form-group col-sm-4">
                                    <input type="text" name="inscMunicipal" placeholder="Inscrição Municipal" class="form-control" autocomplete="off">
                                    <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira o número da inscrição municipal</small>
                                </div>
            
                                <div class="form-group col-sm-4">
                                    <input type="text" name="inscEstadual" placeholder="Inscrição Estadual" class="form-control" autocomplete="off">
                                    <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira o número da inscrição estadual</small>
                                </div>
            
                                <div class="form-group col-sm-1">
                                    <input class="form-control form-control" placeholder="Cód." type="text" name="codigo" autocomplete="off">
                                    <small id="titulo_eleitor_cliente" class="form-text text-muted">Código</small>
                                </div>
                                <div class="form-group col-3">
                                    <input name="natureza_pj" class="custom-select" id="natureza" list="NaturezaOptions" autocomplete="off">
                                    <datalist id="NaturezaOptions">
                                        <option selected></option>
                                        @foreach($naturezas_juridicas as $natureza)
                                        <option>{{$natureza->sigla}}</option>
                                        @endforeach
                                    </datalist>
                                    <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira o número do título de eleitor</small>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>   

        <!-- INÍCIO DO CARD ENDEREÇO -->
        <div class="card">
            <div class="card-header">
                <strong>ENDEREÇO</strong>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <input type="text"  placeholder="Insira o CEP." name="cep" id="cep" class="form-control" autocomplete="off" maxlength="9">
                            <small id="cep_cliente" class="form-text text-muted">Insira o CEP do endereço</small>
                        </div>

                        <div class="form-group col-sm-6">
                            <input type="text" placeholder="Logradouro" name="logradouro" id="rua" class="form-control">
                            <small id="logradouro_cliente" class="form-text text-muted">Insira o logradouro do endereço</small>
                        </div>

                        <div class="form-group col-2">
                            <input placeholder="Número" type="text" name="numEndereco" class="form-control">
                            <small id="numero_endereco_cliente" class="form-text text-muted">Insira o número do logradouro</small>
                        </div>

                        <div class="form-group col-5">
                            <input placeholder="Complemento"  type="text" name="complemento" class="form-control">
                            <small id="complemento_endereco_cliente" class="form-text text-muted">Insira o complemento exemplo: Andar;Apartamento;Bloco;Sobreloja</small>
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" placeholder="Bairro" name="bairro" id="bairro" class="form-control">
                            <small id="bairro_cliente" class="form-text text-muted">Insira o bairro</small>
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" placeholder="Cidade" name="cidade" id="cidade" class="form-control">
                            <small id="cidade_cliente" class="form-text text-muted">Insira o cidade</small>
                        </div>

                        <div class="form-group col-sm-1">
                            <input type="text" placeholder="UF" name="uf" id="uf" class="form-control">
                            <small id="uf_cliente" class="form-text text-muted">UF</small>
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
        </div>
        <!-- FIM DO CARD CONTATO -->

        <ul class="nav nav-tabs col-md-12" role="tablist">
            <li role="presentation" class="nav-item" >
                <a class="nav-link active" href="#processo" aria-controls="processo" data-toggle="tab" role="tab">Processo</a>
            </li>

            <li role="presentation" class="nav-item" >
                <a class="nav-link" href="#servico" aria-controls="servico" data-toggle="tab" role="tab">Serviço</a>
            </li>
        </ul>

        <div class="card tab-content table-responsive-sm">
            <div role="tabpanel" class="tab-pane nav-link active" id="processo">
                <div class="card-body col-12">
                    <p class="card-text">                        
                        <div class="row">
                            <div class="form-group col-sm-9">
                                <input type="text"  value="{{'Proc - '.date("YmdHism").' '.'-'.' '}}" name="pasta" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-3">
                                <input type="text"  placeholder="Instância inicial" name="instInicial" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Número da Inicial" name="numInicial" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Número Principal" name="numPrincipal" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Número do processo" name="numProcesso" id="masc_processo" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-3">
                                <input type="date" name="dtDistribuicao" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-3">
                                <input type="text"  placeholder="Ação" name="acao" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-3">
                                <input type="text"  placeholder="Fase" name="fase" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-3">
                                <input type="text"  placeholder="Natureza" name="natureza" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Rito" name="rito" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Parte contrária" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Advogado da parte contrária" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Órgão Inicial" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-8">
                                <textarea class="form-control"type="text"  placeholder="Título" name="titulo"></textarea>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane nav-link active" id="servico">
                <div class="card-body col-12">
                    <p class="card-text">                        
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <input type="text"  value="{{'Serv - '.date("YmdHism").' '.'-'.' '}}" name="pasta_servico" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Contrato" name="contrato" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Negociação" name="negociacao" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-2">
                                <input type="datetime"  value="{{date("d/m/Y")}}" name="abertura" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-10">
                                <input type="text"  placeholder="Situação" name="situacao" class="form-control">
                            </div>
    
                            <div class="form-group col-sm-12">
                                <textarea type="text"  placeholder="Assunto" name="assunto" class="form-control"></textarea>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>

        <div class="form-group"> <!-- BOTÃO SUBMIT DO FORM -->
            <div class="col-sm-12" align="right">
                <input type="submit" class="btn btn-success" value="Cadastrar">
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="{{url('js/viacep_cliente.js')}}"></script>
    <script src="{{url('js/viacep_parte_contraria.js')}}"></script>
    <script src="{{url('js/adicionar_cliente.js')}}"></script>

@endsection


