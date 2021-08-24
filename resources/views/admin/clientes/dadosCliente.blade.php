@extends('adminlte::page')

@section('title', 'Editar cliente ')

@section('content_header')
<link rel="stylesheet" href="{{url('css/app.css')}}">
<script src="{{url('js/jquery.min.js')}}"></script>
    <h1>
            Dados do cliente
        <a href="{{route('cadastro.index')}}" class="btn btn-sm btn-success">
        <i class="fas fa-reply"></i>
            Voltar
        </a>
    </h1>
    <div align="right">
        <a href="{{route('processo.create', $cliente->id)}}" class="btn btn-sm btn-success">
        <i class="fas fa-gavel"></i>
            Adicionar Processo
        </a>
    </div>
@endsection

@section('content')
    <form>
        @csrf
        <!-- INÍCIO DA PESSOA NATURAL -->
        @if($cliente->nome > 0)
        <div class="card shadow-lg bg-light rounded cadastro natural">
            <div class="card-header bg-light">
                <strong>PESSOA NATURAL</strong>
            </div>
            <div class="card-body col-12">
                <p class="card-text">
                <div class="row">
                    <div class="form-group col-6">
                        <input type="text" name="nome" readonly value="{{$cliente->nome}}" class="form-control" maxlength="150">
                    </div>
                    <div class="form-group col-sm-3">
                        <input type="text" name="cpf" readonly value="{{$cliente->pessoaFisica->cpf}}" class="form-control" maxlength="14">
                    </div>

                    @if($cliente->pessoaFisica->pis > 0)
                        <div class="form-group col-sm-3">
                            <input type="text" name="pis" readonly value="{{$cliente->pessoaFisica->pis}}" class="form-control" maxlength="14">
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text" name="pis" readonly value="PIS não informado." class="form-control" maxlength="14">
                        </div>
                    @endif

                    @if($cliente->pessoaFisica->numCtps > 0)
                        <div class="form-group col-sm-3">
                            <input type="text" name="numCtps" readonly value="{{$cliente->pessoaFisica->numCtps}}" class="form-control" maxlength="7">
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text" name="numCtps" readonly value="Número da CTPS não informado." class="form-control" maxlength="7">
                        </div>
                    @endif

                    @if($cliente->pessoaFisica->serieCtps > 0)
                        <div class="form-group col-sm-2">
                            <input type="text" name="serieCtps" readonly value="{{$cliente->pessoaFisica->serieCtps}}" class="form-control" maxlength="5">
                        </div>
                    @else
                        <div class="form-group col-sm-2">
                            <input type="text" name="serieCtps" readonly value="Série CTPS não informado." class="form-control" maxlength="5">
                        </div>
                    @endif

                    @if($cliente->pessoaFisica->profissao > 0)
                        <div class="form-group input-group col-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="profissao">Profissão</span>
                            </div>
                            <input type="text" name="profissao" readonly value="{{$cliente->pessoaFisica->profissao}}"class="custom-select" id="profissao">
                        </div>
                    @else
                        <div class="form-group input-group col-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="profissao">Profissão</span>
                            </div>
                            <input type="text" name="profissao" readonly value="Não informada."class="custom-select" id="profissao">
                        </div>
                    @endif

                    @if($cliente->pessoaFisica->tituloEleitor > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="tituloEleitor" readonly value="{{$cliente->pessoaFisica->tituloEleitor}}" class="form-control" maxlength="19">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="tituloEleitor" readonly value="Não informado." class="form-control" maxlength="19">
                    </div>
                    @endif

                    @if($cliente->pessoaFisica->idtCivil > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="idtCivil" readonly  value="{{$cliente->pessoaFisica->idtCivil}}" class="form-control" maxlength="13">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="idtCivil" readonly  value="Número do registro geral não informado." class="form-control" maxlength="13">
                    </div>
                    @endif

                    @if($cliente->pessoaFisica->orgExpeditor > 0)
                    <div class="form-group input-group col-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="orgExpeditor">Orgão expeditor</span>
                        </div>
                        <input type="text" name="orgExpeditor" readonly value="{{$cliente->pessoaFisica->orgExpeditor}}"class="custom-select" id="orgExpeditor">
                    </div>
                    @else
                    <div class="form-group input-group col-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="orgExpeditor">Orgão expeditor</span>
                        </div>
                        <input type="text" name="orgExpeditor" readonly value="Orgão não infomado."class="custom-select" id="orgExpeditor">
                    </div>
                    @endif

                    @if($cliente->pessoaFisica->dtExpedicao > 0)
                    <div class="form-group col-sm-2" align="right">
                        <strong>Data de expedição </strong>
                    </div>
                    <div class="form-group col-sm-2">
                        <input type="date" name="dtExpedicao" readonly class="form-control" value="{{$cliente->pessoaFisica->dtExpedicao}}">
                    </div>
                    @else
                    <div class="form-group col-sm-2" align="right">
                        <strong>Data de expedição </strong>
                    </div>
                    <div class="form-group col-sm-2">
                        <input type="date" name="dtExpedicao" readonly class="form-control" value="Não informado.">
                    </div>
                    @endif

                    @if($cliente->pessoaFisica->sexo > 0)
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="sexo">Sexo</span>
                        </div>
                        <input type="text" name="sexo" readonly value="{{$cliente->pessoaFisica->sexo}}"class="custom-select" id="sexo">
                    </div>
                    @else
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="sexo">Sexo</span>
                        </div>
                        <input type="text" name="sexo" readonly value="Não informado"class="custom-select" id="sexo">
                    </div>
                    @endif

                    @if($cliente->pessoaFisica->estadoCivil > 0)
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="estadoCivil">Estado civil</span>
                        </div>
                        <input type="text" name="estadoCivil" readonly value="{{$cliente->pessoaFisica->estadoCivil}}"class="custom-select" id="estadoCivil">
                    </div>
                    @else
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="estadoCivil">Estado civil</span>
                        </div>
                        <input type="text" name="estadoCivil" readonly value="Não informado."class="custom-select" id="estadoCivil">
                    </div>
                    @endif

                    @if($cliente->pessoaFisica->tratamento > 0)
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="tratamento">Tratamento</span>
                        </div>
                        <input type="text" name="tratamento" readonly value="{{$cliente->pessoaFisica->tratamento}}"class="custom-select" id="tratamento">
                    </div>
                    @else
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="tratamento">Tratamento</span>
                        </div>
                        <input type="text" name="tratamento" readonly value="Não informado."class="custom-select" id="tratamento">
                    </div>
                    @endif

                    @if($cliente->pessoaFisica->nacionalidade > 0)
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nacionalidade</span>
                        </div>
                        <input type="text" name="nacionalidade" readonly value="{{$cliente->pessoaFisica->nacionalidade}}" class="custom-select" >
                    </div>
                    @else
                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nacionalidade</span>
                        </div>
                        <input type="text" name="nacionalidade" readonly value="Não informado." class="custom-select" >
                    </div>
                    @endif

                    @if($cliente->pessoaFisica->dtNascimento > 0)
                    <div class="form-group col-sm-2" align="right">
                    <strong>Data de Nascimento </strong>
                    </div>
                    <div class="form-group col-sm-3">
                        <input type="date" name="dtNascimento" class="form-control" readonly value="{{$cliente->pessoaFisica->dtNascimento}}">
                    </div>
                    @else
                    <div class="form-group col-sm-2" align="right">
                    <strong>Data de Nascimento </strong>
                    </div>
                    <div class="form-group col-sm-3">
                        <input type="text" name="dtNascimento" class="form-control" readonly value="Não informado.">
                    </div>
                    @endif

                    <div class="form-group col-sm-6">
                        <input type="text" name="nomeMae" readonly value="{{$cliente->pessoaFisica->nomeMae}}" class="form-control" maxlength="150">
                    </div>
                </div>
            </div>
        </div><!-- FIM DO COLLAPSE PF -->

        @else($cliente->nome_empresa > 0)
        <!-- INÍCIO DO COLLAPSE PJ -->
        <div class="card shadow-lg bg-light rounded cadastro juridica">
            <div class="card-header bg-light">
                <strong>PESSOA JURÍDICA</strong>
            </div>
            <div class="card-body col-12">
                <p class="card-text">
                <div class="row">
                    <div class="form-group col-9">
                        <input type="text" name="nome_empresa" readonly value="{{$cliente->nome_empresa}}" class="form-control @error('nome_empresa') is-invalid @enderror">
                            @error('nome_empresa')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                            @enderror
                    </div>

                    <div class="form-group col-sm-3">
                        <input type="text" name="numero" readonly value="{{$cliente->pessoaJuridica->numero}}" class="form-control" maxlength="18">
                    </div>

                    @if($cliente->pessoaJuridica->inscMunicipal > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal" readonly value="{{$cliente->pessoaJuridica->inscMunicipal}}" class="form-control">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal" readonly placeholder="Inscrição Municipal não informada." class="form-control">
                    </div>
                    @endif

                    @if($cliente->pessoaJuridica->insEstadual > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal" readonly value="{{$cliente->pessoaJuridica->insEstadual}}" class="form-control">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscEstadual" readonly placeholder="Inscrição Estadual não informada." class="form-control">
                    </div>
                    @endif

                    @if($cliente->pessoaJuridica->codigo > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="codigo" readonly value="{{$$cliente->pessoaJuridica->codigo}}" class="form-control">
                    </div>
                    @else
                    <div class="form-group col-sm-2">
                        <input type="text" name="codigo" readonly placeholder="Código não informado." class="form-control">
                    </div>
                    @endif

                    <div class="form-group input-group col-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="natureza">Natureza</label>
                        </div>
                        <input name="natureza_pj" value="{{$cliente->pessoaJuridica->natureza_pj}}" class="custom-select" id="natureza">
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM DO COLLAPSE PJ -->
        @endif
        <!-- INÍCIO DO CARD ENDEREÇO -->
        <div class="card shadow-lg rounded">
            <div class="card-header bg-light">
                <strong>ENDEREÇO</strong>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div class="row">
                    @if($cliente->endereco->cep > 0)
                        <div class="form-group col-sm-3">
                            <input type="text"  value="{{$cliente->endereco->cep}}" name="cep" readonly id="cep" class="form-control" maxlength="8">
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text"  placeholder="CEP não informado" name="cep" readonly id="cep" class="form-control" maxlength="8">
                        </div>
                    @endif

                    @if($cliente->endereco->logradouro > 0)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$cliente->endereco->logradouro}}" name="logradouro" readonly id="rua" class="form-control" maxlength="150">
                        </div>
                    @else
                        <div class="form-group col-sm-4">
                            <input type="text" value="Logradouro não informado." name="logradouro" readonly id="rua" class="form-control" maxlength="150">
                        </div>
                    @endif

                    @if($cliente->endereco->numEndereco > 0)
                        <div class="form-group col-1">
                            <input value="{{$cliente->endereco->numEndereco}}" type="text" name="numEndereco" readonly class="form-control" maxlength="10">
                        </div>
                    @else
                        <div class="form-group col-2">
                            <input value="Nº não informado" type="text" name="numEndereco" readonly class="form-control" maxlength="10">
                        </div>
                    @endif

                    @if($cliente->endereco->complemento > 0)
                        <div class="form-group col-3">
                            <input value="{{$cliente->endereco->complemento}}"  type="text" name="complemento" readonly class="form-control" maxlength="50">
                        </div>
                    @else
                        <div class="form-group col-3">
                            <input value="Complemento não informado."  type="text" name="complemento" readonly class="form-control" maxlength="50">
                        </div>
                    @endif

                    @if($cliente->endereco->bairro > 0)
                        <div class="form-group col-sm-3">
                            <input type="text" value="{{$cliente->endereco->bairro}}" name="bairro" id="bairro" readonly class="form-control" maxlength="60">
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text" value="Bairro não informado." name="bairro" id="bairro" readonly class="form-control" maxlength="60">
                        </div>
                    @endif

                    @if($cliente->endereco->cidade > 0)
                        <div class="form-group col-sm-3">
                            <input type="text" value="{{$cliente->endereco->cidade}}" name="cidade" id="cidade" readonly class="form-control" maxlength="60">
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text" value="Cidade não informada." name="cidade" id="cidade" readonly class="form-control" maxlength="60">
                        </div>
                    @endif

                    @if($cliente->endereco->uf > 0)
                        <div class="form-group col-sm-1">
                            <input type="text" value="{{$cliente->endereco->uf}}" name="uf" id="uf" readonly class="form-control" maxlength="2">
                        </div>
                    @else
                        <div class="form-group col-sm-2">
                            <input type="text" value="UF não informada." name="uf" id="uf" readonly class="form-control" maxlength="2">
                        </div>
                    @endif
                    </div>
                </p>
            </div>
        <!-- FIM DO CARD ENDEREÇO -->

        <!-- INÍCIO DO CARD CONTATO -->
            <div class="card-header bg-light">
                <strong>CONTATO</strong>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div class="row">
                        @foreach($cliente->contato as $contato)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$contato->email}}" name="email" readonly class="form-control" maxlength="100">
                        </div>

                        @if(isset($contato->telefone) > 0)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$contato->telefone}}" name="telefone" readonly class="form-control" maxlength="13">
                        </div>
                        @else
                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Telefone não informado." name="telefone" readonly class="form-control" maxlength="13">
                        </div>
                        @endif

                        @if(isset($contato->celular) > 0)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$contato->celular}}" name="celular" readonly class="form-control" maxlength="14">
                        </div>
                        @else
                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Celular não informado." name="celular" readonly class="form-control" maxlength="14">
                        </div>
                        @endif
                        @endforeach
                    </div>
                </p>
            </div>
        <!-- FIM DO CARD CONTATO -->
        </div>
    </form>
    <script src="{{url('js/botao_pf_pj.js')}}"></script>
    <script src="{{url('js/viacep_cliente.js')}}"></script>
    <script src="{{url('js/viacep_parte_contraria.js')}}"></script>
@endsection


