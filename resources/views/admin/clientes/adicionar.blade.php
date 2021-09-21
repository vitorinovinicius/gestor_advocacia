@extends('adminlte::page')

@section('title', 'Novo cliente ')

@section('content_header')

@section('css')
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <!-- Estiilização localizada no diretório: public/css/ -->
@endsection
<script type="text/javascript" src="{{url('js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.mask.min.js')}}"></script>
<!-- Jquery especifico para a utilização das máscaras.
    localizada no diretório: public/js/-->
<script type="text/javascript" src="{{url('js/mask_number.js')}}"></script>
<!-- mask_number: Aplica máscara com pontuação em dados como CPF, CNPJ, CEP...
    localizada no diretório: public/js/-->
<script type="text/javascript" src="{{url('js/mascara_processo.js')}}"></script>
<!-- mascara_processo: Aplica máscara com pontuação na numeração do processo.
    localizada no diretório: public/js/-->

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
            date_default_timezone_set('America/Sao_Paulo') //Utilização do timezone brasileira.
        @endphp
                <!-- Início dos botões do collapse de Pessoa Natural e Pessoa Jurídica -->
                <ul class="nav nav-tabs col-md-12" role="tablist">
                    <li role="presentation" class="nav-item" >
                        <a class="nav-link active" href="#pessoa_fisica" aria-controls="pessoa_fisica" data-toggle="tab" role="tab">Pessoa Natural</a>
                    </li>

                    <li role="presentation" class="nav-item" >
                        <a class="nav-link" href="#pessoa_juridica" aria-controls="pessoa_juridica" data-toggle="tab" role="tab">Pessoa Jurídica</a>
                    </li>
                </ul>
                <!-- Final dos botões do collapse de Pessoa Natural e Pessoa Jurídica -->
                <!-- Início do card com dados da Pessoa Natural -->
                <div class="card tab-content table-responsive-sm">
                    <div role="tabpanel" class="tab-pane nav-link active" id="pessoa_fisica">
                        <div class="card-body col-12">
                            <p class="card-text">
                                <div class="row">
                                    <div class="form-group col-9">
                                        <input type="text" name="nome" placeholder="Nome completo" class="form-control" maxlength="150" aria-describedby="nome_cliente" autocomplete="off">
                                        <small id="nome_cliente" class="form-text text-muted">Insira o nome completo</small>
                                    </div><!-- Neste campo o usuário insere o nome completo do cliente. -->

                                    <div class="form-group col-sm-3">
                                        <input type="text" name="cpf" placeholder="CPF" id="cpf" class="form-control" maxlength="14" aria-describedby="cpf_cliente" autocomplete="off">
                                        <small id="cpf_cliente" class="form-text text-muted">Insira o número do CPF</small>
                                    </div><!-- Neste campo o usuário insere o número do CPF do cliente. Campo utiliza máscara de numeração 999.999.999-9 -->

                                    <div class="form-group col-sm-3">
                                        <input type="text" name="idtCivil" placeholder="Identidade" id="rg" class="form-control" maxlength="13" aria-describedby="idtCivil_cliente" autocomplete="off">
                                        <small id="idtCivil_cliente" class="form-text text-muted">Insira o número da Identidade </small>
                                    </div><!-- Neste campo o usuário insere a data de nascimento do cliente. -->

                                    <div class="form-group col-sm-4">
                                        <input type="text" name="orgExpeditor" class="custom-select" id="orgExpeditor" list="orgExpeditorOptions" aria-describedby="orgExpeditor_cliente" autocomplete="off">
                                        <datalist id="orgExpeditorOptions">
                                            <option selected></option>
                                            @foreach($orgExpeditores as $orgExpeditor)
                                            <option>{{$orgExpeditor->tipo}}</option>
                                            @endforeach
                                        </datalist>
                                        <small id="orgExpeditor_cliente" class="form-text text-muted">Selecione o órgão expeditor</small>
                                    </div><!-- Neste campo o usuário insere a data de nascimento do cliente. -->

                                    <div class="form-group col-sm-2">
                                        <input type="text" name="ufExpeditor" class="custom-select" id="ufExpeditor" list="ufExpeditorOptions" aria-describedby="ufExpeditor" autocomplete="off">
                                        <datalist id="ufExpeditorOptions">
                                            <option selected></option>
                                            @foreach($estados as $estado)
                                            <option>{{$estado->uf}}</option>
                                            @endforeach
                                        </datalist>
                                        <small id="uf_ctps" class="form-text text-muted">Selecione a UF da identidade</small>
                                    </div><!-- Neste campo o usuário insere a data de nascimento do cliente. -->

                                    <div class="form-group col-sm-3">
                                        <input type="date" name="dtExpedicao"  class="form-control" aria-describedby="dtExpeditor_cliente">
                                        <small id="dtExpedicao_cliente" class="form-text text-muted">Insira a data de expedição</small>
                                    </div><!-- Neste campo o usuário insere a data de nascimento do cliente. -->

                                    <div class="form-group col-sm-4">
                                        <input type="text" name="pis" placeholder="PIS" id="pis" class="form-control" maxlength="14" aria-describedby="pis_cliente" autocomplete="off">
                                        <small id="pis_cliente" class="form-text text-muted">Insira o número do PIS</small>
                                    </div><!-- Neste campo o usuário insere o número do PIS do cliente. Campo utiliza máscara de numeração 999.99999.99-9 -->

                                    <div class="form-group col-sm-4">
                                        <input type="text" name="numCtps" placeholder="Número CTPS" id="numCtps" class="form-control" maxlength="7" aria-describedby="numCtps_cliente" autocomplete="off">
                                        <small id="numCtps_cliente" class="form-text text-muted">Insira o número da CTPS</small>
                                    </div><!-- Neste campo o usuário insere o número da CTPS do cliente. Valor máximo de 7 dígitos -->

                                    <div class="form-group col-sm-2">
                                        <input type="text" name="serieCtps" placeholder="Série CTPS" id="serieCtps" class="form-control" maxlength="5" aria-describedby="serieCtps_cliente" autocomplete="off">
                                        <small id="serieCtps_cliente" class="form-text text-muted">Insira a série da CTPS</small>
                                    </div><!-- Neste campo o usuário insere o número da CTPS do cliente. Valor máximo de 6 dígitos -->

                                    <div class="form-group col-sm-2">
                                        <input type="text" name="ufCtps" class="custom-select" id="uf_ctps" list="ctpsOptions" aria-describedby="uf_ctps" autocomplete="off">
                                        <datalist id="ctpsOptions">
                                            <option selected></option>
                                            @foreach($estados as $estado)
                                            <option>{{$estado->uf}}</option>
                                            @endforeach
                                        </datalist>
                                        <small id="uf_ctps" class="form-text text-muted">Selecione a UF da CTPS</small>
                                    </div><!-- Neste campo o usuário insere a data de nascimento do cliente. -->

                                    <div class="form-group col-sm-5">
                                        <input type="text" name="profissao" class="custom-select" id="profissao" list="profissaoOptions" aria-describedby="profissao_cliente" autocomplete="off">
                                        <datalist id="profissaoOptions">
                                            <option selected></option>
                                            @foreach($profissoes as $profissao)
                                            <option>{{$profissao->tipo}}</option>
                                            @endforeach
                                        </datalist>
                                        <small id="profissao_cliente" class="form-text text-muted">Selecione ou insira a profissão</small>
                                    </div><!-- Neste campo o usuário insere a data de nascimento do cliente. -->

                                    <div class="form-group col-sm-3">
                                        <input type="text" name="tituloEleitor" placeholder="Título de eleitor" id="titulo_eleitor" class="form-control" maxlength="19" aria-describedby="titulo_eleitor_cliente" autocomplete="off">
                                        <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira o número do título de eleitor</small>
                                    </div><!-- Neste campo o usuário insere a data de nascimento do cliente. -->

                                    <div class="form-group col-sm-2">
                                        <input type="text" name="sexo" class="custom-select" id="sexo" list="sexoOptions" aria-describedby="sexo_cliente" autocomplete="off">
                                        <datalist id="sexoOptions">
                                            <option selected></option>
                                            <option>Masculino</option>
                                            <option>Feminino</option>
                                        </datalist>
                                        <small id="sexo_cliente" class="form-text text-muted">Selecione o sexo</small>
                                    </div><!-- Neste campo o usuário insere a data de nascimento do cliente. -->

                                    <div class="form-group col-sm-2">
                                        <input type="text" name="estadoCivil" class="custom-select" id="estadoCivil" list="estadoCivilOptions" aria-describedby="estado_civil_cliente" autocomplete="off">
                                        <datalist id="estadoCivilOptions">
                                            <option selected></option>
                                            @foreach($estadoscivis as $estadoscivil)
                                            <option>{{$estadoscivil->tipo}}</option>
                                            @endforeach
                                        </datalist>
                                        <small id="estado_civil_cliente" class="form-text text-muted">Selecione o estado civil</small>
                                    </div><!-- Neste campo o usuário insere a data de nascimento do cliente. -->

                                    <div class="form-group col-sm-4">
                                        <input type="text" name="tratamento" class="custom-select" id="tratamento" list="tratamentoOptions" aria-describedby="tratamento_cliente" autocomplete="off">
                                        <datalist id="tratamentoOptions">
                                            <option selected></option>
                                            @foreach($tratamentos as $tratamento)
                                            <option>{{$tratamento->tipo}}</option>
                                            @endforeach
                                        </datalist>
                                        <small id="tratamento_cliente" class="form-text text-muted">Selecione o tratamento</small>
                                    </div><!-- Neste campo o usuário insere a data de nascimento do cliente. -->

                                    <div class="col"></div>

                                    <div class="form-group col-sm-4">
                                        <input type="text" name="nacionalidade" class="custom-select" id="nacionalidade" list="nacionalidadeOptions" aria-describedby="nacionalidade_cliente" autocomplete="off">
                                        <datalist id="nacionalidadeOptions">
                                            <option selected></option>
                                            @foreach($nacionalidades as $nacionalidade)
                                            <option>{{$nacionalidade->tipo}}</option>
                                            @endforeach
                                        </datalist>
                                        <small id="nacionalidade_cliente" class="form-text text-muted">Selecione a nacionalidade</small>
                                    </div><!-- Neste campo o usuário insere a data de nascimento do cliente. -->

                                    <div class="col"></div>

                                    <div class="form-group col-sm-3">
                                        <input type="date" name="dtNascimento" class="form-control" aria-describedby="data_nascimento_cliente">
                                        <small id="data_nascimento_cliente" class="form-text text-muted">Insira a data de nascimento</small>
                                    </div><!-- Neste campo o usuário insere a data de nascimento do cliente. -->

                                    <div class="form-group col-sm-9">
                                        <input type="text" name="nomeMae" placeholder="Nome da mãe" class="form-control" maxlength="150" aria-describedby="nome_mae_cliente" autocomplete="off">
                                        <small id="nome_mae_cliente" class="form-text text-muted">Insira o nome completo da mãe</small>
                                    </div><!-- Neste campo o usuário insere o nome da mãe do cliente. -->
                                </div>
                            </p>
                        </div>
                    </div>
                    <!-- Final do card com dados da Pessoa Natural -->
                    <!-- Início do card com dados da Pessoa Jurídica -->
                    <div role="tabpanel" class="tab-pane nav-link" id="pessoa_juridica">
                        <div class="card-body col-12">
                            <p class="card-text">
                            <div class="row">
                                <div class="form-group col-9">
                                    <input type="text" name="nome_empresa" placeholder="Razão social" class="form-control" autocomplete="off">
                                    <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira a razão social da empresa</small>
                                </div><!-- Neste campo o usuário insere a razão social da empresa. -->

                                <div class="form-group col-sm-3">
                                    <input type="text" id="cnpj" name="numero" placeholder="Número CNPJ" class="form-control" maxlength="18" autocomplete="off">
                                    <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira o número do CNPJ</small>
                                </div><!-- Neste campo o usuário insere o número do CNPJ da empresa. -->

                                <div class="form-group col-sm-4">
                                    <input type="text" name="inscMunicipal" placeholder="Inscrição Municipal" class="form-control" autocomplete="off">
                                    <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira o número da inscrição municipal</small>
                                </div> <!-- Neste campo o usuário insere o número da inscrição Municipal da empresa caso haja. -->

                                <div class="form-group col-sm-4">
                                    <input type="text" name="inscEstadual" placeholder="Inscrição Estadual" class="form-control" autocomplete="off">
                                    <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira o número da inscrição estadual</small>
                                </div> <!-- Neste campo o usuário insere o número da inscrição Estadual da empresa caso haja. -->

                                <div class="form-group col-sm-2">
                                    <input class="form-control form-control" placeholder="Cód." type="text" name="codigo" autocomplete="off">
                                    <small id="titulo_eleitor_cliente" class="form-text text-muted">Código</small>
                                </div><!-- Neste campo o usuário insere o código inscrição Municipal da empresa caso haja. -->

                                <div class="form-group col-2">
                                    <input name="natureza_pj" class="custom-select" id="natureza" list="NaturezaOptions" autocomplete="off">
                                    <datalist id="NaturezaOptions">
                                        <option selected></option>
                                        @foreach($naturezas_juridicas as $natureza)
                                        <option>{{$natureza->sigla}}</option> <!-- Recebe dados do banco de dados. Dados chamados na rota cadastro.create. -->
                                        @endforeach
                                    </datalist>
                                    <small id="titulo_eleitor_cliente" class="form-text text-muted">Insira a natureza jurídica</small>
                                </div><!-- Neste campo o usuário seleciona o tipo de natureza jurídica. -->
                            </div>
                        </div>
                    </div><!-- Final do card com dados da Pessoa Jurídica -->
                </div>

        <!-- Início do card endereço -->
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
                        </div><!-- Neste campo o usuário insere o CEP, se a API estiver conectada à rede, preencherá os respectivos campos do form. endereço caso contrário o usuário deverá preencher manualmente. -->

                        <div class="form-group col-sm-6">
                            <input type="text" placeholder="Logradouro" name="logradouro" id="rua" class="form-control" autocomplete="off">
                            <small id="logradouro_cliente" class="form-text text-muted">Insira o logradouro do endereço</small>
                        </div><!-- Recebe dados da API CEP. -->

                        <div class="form-group col-2">
                            <input placeholder="Número" type="text" name="numEndereco" class="form-control" autocomplete="off">
                            <small id="numero_endereco_cliente" class="form-text text-muted">Insira o número do logradouro</small>
                        </div><!-- Neste campo o usuário deve inserir o número do logradouro -->

                        <div class="form-group col-5">
                            <input placeholder="Complemento"  type="text" name="complemento" class="form-control" autocomplete="off">
                            <small id="complemento_endereco_cliente" class="form-text text-muted">Insira o complemento exemplo: Andar;Apartamento;Bloco;Sobreloja</small>
                        </div><!-- Neste campo o usuário deve inserir dados do complemento do endereço caso haja. -->

                        <div class="form-group col-sm-3">
                            <input type="text" placeholder="Bairro" name="bairro" id="bairro" class="form-control" autocomplete="off">
                            <small id="bairro_cliente" class="form-text text-muted">Insira o bairro</small>
                        </div><!-- Recebe dados da API CEP. -->

                        <div class="form-group col-sm-3">
                            <input type="text" placeholder="Cidade" name="cidade" id="cidade" class="form-control" autocomplete="off">
                            <small id="cidade_cliente" class="form-text text-muted">Insira o cidade</small>
                        </div><!-- Recebe dados da API CEP. -->

                        <div class="form-group col-sm-1">
                            <input type="text" placeholder="UF" name="uf" id="uf" class="form-control" autocomplete="off">
                            <small id="uf_cliente" class="form-text text-muted">UF</small>
                        </div><!-- Recebe dados da API CEP. -->
                    </div>
                </p>
            </div>
        <!-- Final do card endereço -->

        <!-- Início do card contato -->
            <div class="card-header">
                <strong>CONTATO</strong>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <input type="email" placeholder="E-mail" name="email" class="form-control" aria-describedby="email_cliente" autocomplete="off">
                            <small id="email_cliente" class="form-text text-muted">Insira o e-mail - exemplo: seuemail@exemplo.com</small>
                        </div><!-- Neste campo o usuário insere o e-mail de contato do cliente -->

                        <div class="form-group col-sm-2">
                            <select  class="custom-select">
                                <option selected></option>
                                <option>Telefone</option>
                                <option>Celular</option>
                            </select>
                            <small id="instancia_processo" class="form-text text-muted">Tipo de contato</small>
                        </div><!-- Neste campo o usuário seleciona o tipo de contato. -->


                        <div class="col-sm-4" id="telefone_cliente">
                            <input type="text" id="telefone" placeholder="Telefone" name="telefone" class="form-control" autocomplete="off">
                            <button type="button" class="btn btn-sm btn-success " id="add_telefone">+</button>
                        </div><!-- Neste campo o usuário insere o número de telefone de contato do cliente -->

                        <div class="form-group col-sm-4">
                            <input type="text" id="celular" placeholder="Celular" name="celular" class="form-control" maxlength="15" onkeyup="mascara_celular()" aria-describedby="telefone_cliente" autocomplete="off">
                            <small id="telefone_cliente" class="form-text text-muted">Insira o telefone - exemplo: (99) 9999-9999</small>
                        </div><!-- Neste campo o usuário insere o número de celular de contato do cliente -->
                    </div>
                </p>
            </div>
        </div>
        <!-- Final do card contato -->
        <!-- Início dos botões do collapse de Processo e Serviço -->
        <ul class="nav nav-tabs col-md-12" role="tablist">
            <li role="presentation" class="nav-item" >
                <a class="nav-link active" href="#processo" aria-controls="processo" data-toggle="tab" role="tab">Processo</a>
            </li>

            <li role="presentation" class="nav-item" >
                <a class="nav-link" href="#servico" aria-controls="servico" data-toggle="tab" role="tab">Serviço</a>
            </li>
        </ul>
        <!-- Final dos botões do collapse de Processo e Serviço -->

        <!-- Início do card com dados do Processo -->
        <div class="card tab-content table-responsive-sm">
            <div role="tabpanel" class="tab-pane nav-link active" id="processo">
                <div class="card-body col-12"><!-- Início do corpo do card - Processo -->
                    <p class="card-text">
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <input type="text"  value="{{'Proc - '.$timenow = date("YmdHis").rand(000001, 999999)}}" readonly name="pasta" class="form-control" aria-describedby="pasta_processo" autocomplete="off">
                                <small id="pasta_processo" class="form-text text-muted">Número da pasta do processo</small>
                            </div><!-- Neste campo insere o número da pasta do processo automaticamente, buscando data/hora mais número aleatorio de 6 digitos.-->

                            <div class="form-group col-sm-6">
                                <input type="text"  name="nome_processo" class="form-control" aria-describedby="nome_processo" autocomplete="off">
                                <small id="pasta_processo" class="form-text text-muted">Nome da pasta do processo exemplo: Nome do cliente vs Nome da parte contrária</small>
                            </div><!-- Neste campo o usuário insere o nome da pasta do processo.-->

                            <div class="form-group col-sm-3">
                                <select  class="custom-select" name="instInicial">
                                    <option selected></option>
                                    @foreach($instancias as $instancia)
                                    <option>{{$instancia->tipo_instancia}}</option>
                                    @endforeach
                                </select>
                                <small id="instancia_processo" class="form-text text-muted">Selecione a instância do processo</small>
                            </div><!-- Neste campo o usuário seleciona o tipo de intância que o processo se encontra. -->

                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Número Inicial" name="numInicial" class="form-control" aria-describedby="numero_inicial_processo" autocomplete="off">
                                <small id="numero_inicial_processo" class="form-text text-muted">Insira o número inicial do processo</small>
                            </div><!-- Neste campo o usuário insere o número inicial do processo. -->

                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Número Principal" name="numPrincipal" class="form-control" aria-describedby="numero_principal_processo" autocomplete="off">
                                <small id="numero_principal_processo" class="form-text text-muted">Insira o número principal do processo</small>
                            </div><!-- Neste campo o usuário insere o número principal do processo. -->

                            <div class="col-sm-1"></div>

                            <div class="form-group col-sm-3">
                                <input type="date" name="dtDistribuicao" class="form-control" aria-describedby="dtDistribuicao_processo">
                                <small id="dtDistribuicao_processo" class="form-text text-muted">Insira a data de distribuição</small>
                            </div><!-- Neste campo o usuário insere a data que foi distribuído o processo. -->

                            <div class="form-group col-sm-3">
                                <select  class="custom-select" name="acao">
                                    <option selected></option>
                                    @foreach($acoes as $acao)
                                    <option>{{$acao->tipo}}</option>
                                    @endforeach
                                </select>
                                <small id="acao_processo" class="form-text text-muted">Selecione a ação do processo</small>
                            </div><!-- Neste campo o usuário seleciona que tipo de ação será o processo. -->

                            <div class="form-group col-sm-3">
                                <select  class="custom-select" name="fase">
                                    <option selected></option>
                                    @foreach($fases as $fase)
                                    <option>{{$fase->tipo}}</option>
                                    @endforeach
                                </select>
                                <small id="fase_processo" class="form-text text-muted">Selecione a fase do processo</small>
                            </div><!-- Neste campo o usuário seleciona a fase que processo se encontra. -->

                            <div class="form-group col-sm-3">
                                <select  class="custom-select" name="natureza">
                                    <option selected></option>
                                    @foreach($naturezas as $natureza)
                                    <option>{{$natureza->tipo}}</option>
                                    @endforeach
                                </select>
                                <small id="natureza_processo" class="form-text text-muted">Selecione a natureza do processo</small>
                            </div><!-- Neste campo o usuário seleciona a natureza do processo. -->

                            <div class="form-group col-sm-3">
                                <select  class="custom-select" name="natureza">
                                    <option selected></option>
                                    @foreach($ritos as $rito)
                                    <option>{{$rito->tipo}}</option>
                                    @endforeach
                                </select>
                                <small id="rito_processo" class="form-text text-muted">Selecione o rito do processo</small>
                            </div><!-- Neste campo o usuário seleciona o tipo de rito do processo. -->

                            <div class="form-group col-sm-6">
                                <input type="text"  placeholder="Parte contrária" class="form-control" aria-describedby="parte_contraria_processo">
                                <small id="parte_contraria_processo" class="form-text text-muted">Insira o nome da parte contrária</small>
                            </div><!-- Neste campo o usuário insere o nome completo da parte contrária ao processo. -->

                            <div class="form-group col-sm-6">
                                <input type="text"  placeholder="Advogado da parte contrária" class="form-control" aria-describedby="adv_parte_contraria_processo">
                                <small id="adv_parte_contraria_processo" class="form-text text-muted">Insira o nome do advogado da parte contrária</small>
                            </div><!-- Neste campo o usuário insere o nome completo do advogado da parte contrária ao processo. -->

                            <div class="form-group col-sm-12">
                                <input type="text"  placeholder="Órgão Inicial" class="form-control" aria-describedby="orgao_inicial_processo">
                                <small id="orgao_inicial_processo" class="form-text text-muted">Insira o local do órgão inicial</small>
                            </div><!-- Neste campo o usuário insere o endereço completo do órgão inicial. Exemplo: TJRJ, 1ª vara do TRT. -->
                        </div>
                    </p>
                </div><!-- Final do corpo do card - Processo -->
            </div>
            <!-- Final do card com dados do Processo -->

            <!-- Início do card com dados do Serviço -->
            <div role="tabpanel" class="tab-pane nav-link" id="servico">
                <div class="card-body col-12"> <!-- Início do corpo do card - Serviço -->
                    <p class="card-text">
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <input type="text"  value="{{'Serv - '.$timenow = date("YmdHis", time()).rand(000001, 999999)}}" readonly name="pasta_servico" class="form-control" aria-describedby="pasta_servico">
                                <small id="pasta_servico" class="form-text text-muted">Número da pasta do serviço</small>
                            </div><!-- Neste campo o usuário seleciona o tipo de rito do processo. -->

                            <div class="form-group col-sm-6">
                                <input type="text"  name="nome_servico" class="form-control" aria-describedby="pasta_servico">
                                <small id="pasta_servico" class="form-text text-muted">Nome da pasta do serviço exemplo: Nome do cliente vs Nome da parte contrária</small>
                            </div><!-- Neste campo o usuário seleciona o tipo de rito do processo. -->

                            <div class="form-group col-sm-3">
                                <input type="date" name="abertura" class="form-control" aria-describedby="abertura_servico" autocomplete="off">
                                <small id="abertura_servico" class="form-text text-muted">Insira a data de abertura</small>
                            </div><!-- Neste campo o usuário seleciona o tipo de rito do processo. -->

                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Contrato" name="contrato" class="form-control" aria-describedby="contrato_servico" autocomplete="off">
                                <small id="contrato_servico" class="form-text text-muted">Insira ou selecione o contrato do serviço</small>
                            </div><!-- Neste campo o usuário seleciona o tipo de rito do processo. -->

                            <div class="form-group col-sm-3">
                                <input type="text"  placeholder="Natureza do serviço" name="natureza_servico" class="form-control" aria-describedby="abertura_servico" autocomplete="off">
                                <small id="natureza_servico" class="form-text text-muted">Insira a natureza do serviço</small>
                            </div><!-- Neste campo o usuário seleciona o tipo de rito do processo. -->

                            <div class="form-group col-sm-2"></div>

                            <div class="form-group col-sm-3">
                                <input type="text"  placeholder="Status" name="situacao" class="form-control" aria-describedby="abertura_servico" autocomplete="off">
                                <small id="abertura_servico" class="form-text text-muted">Selecione o status do serviço</small>
                            </div><!-- Neste campo o usuário seleciona o tipo de rito do processo. -->

                            <div class="form-group col-sm-12">
                                <textarea type="text"  placeholder="Descrição do serviço" class="form-control" name="assunto" class="form-control" aria-describedby="descricao_servico" autocomplete="off"></textarea>
                                <small id="descricao_servico" class="form-text text-muted">Insira a descrição do serviço</small>
                            </div><!-- Neste campo o usuário seleciona o tipo de rito do processo. -->
                        </div>
                    </p>
                </div><!-- Final do corpo do card - Processo -->
            </div><!-- Final do card com dados do Serviço. -->
        </div>

        <!-- Início do botão submit cadastro dos dados do formulário. -->
        <div class="form-group">
            <div class="col-sm-12" align="right">
                <input type="submit" class="btn btn-success" value="Cadastrar"> <!-- Envia os dados via método POST para a rota cadastro.store. -->
            </div>
        </div>
        <!-- Final do botão submit cadastro dos dados do formulário. -->
    </form>
@endsection

@section('js')
    <script src="{{url('js/viacep_cliente.js')}}"></script><!-- Consumo da API VIA CEP onde preenche os dados de endereço do cliente via Jquery. -->
    <script src="{{url('js/viacep_parte_contraria.js')}}"></script><!-- Consumo da API VIA CEP onde preenche os dados de endereço da parte contrária via Jquery. -->
    <script src="{{url('js/adicionar_cliente.js')}}"></script><!-- Botão com animação do SweetAlert 2 onde confirma o envio de dados. -->

@endsection


