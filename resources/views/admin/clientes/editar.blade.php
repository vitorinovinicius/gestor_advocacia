@extends('adminlte::page')

@section('title', 'Editar cliente ')

@section('content_header')
<link rel="stylesheet" href="{{url('css/app.css')}}">
<script src="{{url('js/jquery.min.js')}}"></script>
<script src="{{url('js/mascara_cadastro.js')}}"></script>
    <h1>
            Editar dados do cliente
        <a href="{{route('cadastro.index')}}" class="btn btn-sm btn-success">
        <i class="fas fa-reply"></i>
            Voltar
        </a>
    </h1>
@endsection

@section('content')
    <form action="{{ route('cadastro.update', $cliente->id) }}" method="POST" >
        @csrf
        @method('PUT')
        <!-- INÍCIO DA PESSOA NATURAL -->
        @if($cliente->nome > 0)
        <div class="card cadastro natural">
            <div class="card-header">
                <strong>PESSOA NATURAL</strong>
            </div>
            <div class="card-body col-12">
                <p class="card-text">
                <div class="row">
                    <div class="form-group col-6">
                        <input type="text" name="nome" value="{{$cliente->nome}}" class="form-control" maxlength="150">
                    </div>
                    <div class="form-group col-sm-3">
                        <input type="text" name="cpf" value="{{$cliente->pessoaFisica->cpf}}" class="form-control" maxlength="14" autocomplete="off">
                    </div>

                    @if($cliente->pessoaFisica->pis > 0)
                    <div class="form-group col-sm-3">
                        <input type="text" name="pis" value="{{$cliente->pessoaFisica->pis}}" class="form-control" maxlength="14" autocomplete="off">
                    </div>
                    @else
                    <div class="form-group col-sm-3">
                        <input type="text" name="pis" placeholder="PIS não informado." class="form-control" maxlength="14" autocomplete="off" onkeyup="mascara_pis()">
                    </div>
                    @endif

                    @if($cliente->pessoaFisica->numCtps > 0)
                    <div class="form-group col-sm-3">
                        <input type="text" name="numCtps" value="{{$cliente->pessoaFisica->numCtps}}" class="form-control" maxlength="7" autocomplete="off">
                    </div>
                    @else
                    <div class="form-group col-sm-3">
                        <input type="text" name="numCtps" placeholder="Número da CTPS não infomado." class="form-control" maxlength="7" autocomplete="off">
                    </div>
                    @endif

                    @if($cliente->pessoaFisica->serieCtps > 0)
                    <div class="form-group col-sm-3">
                        <input type="text" name="serieCtps" value="{{$cliente->pessoaFisica->serieCtps}}" class="form-control" maxlength="5" autocomplete="off">
                    </div>
                    @else
                    <div class="form-group col-sm-3">
                        <input type="text" name="serieCtps" placeholder="Nº de série da CTPS não infomado." class="form-control" maxlength="5" autocomplete="off">
                    </div>
                    @endif

                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="profissao">Profissão</label>
                        </div>
                        <select name="profissao" class="custom-select" id="profissao">
                        <option selected>{{$cliente->pessoaFisica->profissao}}</option>
                        @foreach($profissoes as $profissao)
                        <option>{{$profissao->tipo}}</option>
                        @endforeach
                        </select>

                    </div>

                    @if($cliente->pessoaFisica->serieCtps <= 0 && $cliente->pessoaFisica->tituloEleitor > 0)
                    <div class="form-group col-sm-3">
                        <input type="text" value="{{$cliente->pessoaFisica->tituloEleitor}}" name="tituloEleitor" class="form-control" maxlength="19">
                    </div>
                    @else
                    <div class="form-group col-sm-3">
                        <input type="text" placeholder="Título de eleitor não informado." name="tituloEleitor" class="form-control" maxlength="19">
                    </div>
                    @endif 

                    <div class="form-group col-sm-4">
                        <input type="text" value="{{$cliente->pessoaFisica->idtCivil}}" name="idtCivil" class="form-control" maxlength="13">
                            @error('idtCivil')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                            @enderror
                    </div>

                    <div class="form-group input-group col-4">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="orgExpeditor">Orgão expeditor</label>
                        </div>
                        <select name="orgExpeditor" class="custom-select" id="orgExpeditor">
                            <option selected>{{$cliente->pessoaFisica->orgExpeditor}}</option>
                            @foreach($orgexpeditores as $orgExpeditor)
                            <option>{{$orgExpeditor->tipo}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-2" align="right">
                    <strong>Data de expedição </strong>
                    </div>

                    <div class="form-group col-sm-2">
                        <input type="date" name="dtExpedicao" class="form-control" value="{{$cliente->pessoaFisica->dtExpedicao}}">
                    </div>

                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="sexo">Sexo</label>
                        </div>
                        <select name="sexo" class="custom-select" id="sexo">
                            <option selected>{{$cliente->pessoaFisica->sexo}}</option>
                            <option>Masculino</option>
                            <option>Feminino</option>
                        </select>
                    </div>

                    <div class="form-group input-group col-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="estadoCivil">Estado civil</label>
                        </div>
                        <select name="estadoCivil" class="custom-select" id="estadoCivil">
                            <option selected>{{$cliente->pessoaFisica->estadoCivil}}</option>
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
                            <option selected>{{$cliente->pessoaFisica->tratamento}}</option>
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
                            <option selected>{{$cliente->pessoaFisica->nacionalidade}}</option>
                            @foreach($nacionalidades as $nacionalidade)
                            <option>{{$nacionalidade->tipo}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-2" align="right">
                    <strong>Data de Nascimento </strong>
                    </div>
                    <div class="form-group col-sm-3">
                        <input type="date" name="dtNascimento" class="form-control" value="{{$cliente->pessoaFisica->dtNascimento}}">
                    </div>

                    <div class="form-group col-sm-6">
                        <input type="text" value="{{$cliente->pessoaFisica->nomeMae}}" name="nomeMae" class="form-control" maxlength="150">
                    </div>
                </div>
            </div>
        </div><!-- FIM DO COLLAPSE PF -->

        @else($cliente->nome_empresa > 0)
        <!-- INÍCIO DO COLLAPSE PJ -->
        <div class="card cadastro juridica">
            <div class="card-header">
                <strong>PESSOA JURÍDICA</strong>
            </div>
            <div class="card-body col-12">
                <p class="card-text">
                <div class="row">
                    <div class="form-group col-9">
                        <input type="text" name="nome_empresa" value="{{$cliente->nome_empresa}}" class="form-control @error('nome_empresa') is-invalid @enderror">
                            @error('nome_empresa')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                            @enderror
                    </div>

                    <div class="form-group col-sm-3">
                        <input type="text" name="numero" value="{{$cliente->pessoaJuridica->numero}}" class="form-control" maxlength="18">
                    </div>

                    @if($cliente->pessoaJuridica->inscMunicipal > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal" value="{{$cliente->pessoaJuridica->inscMunicipal}}" class="form-control">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal" placeholder="Inscrição Municipal" class="form-control">
                    </div>
                    @endif

                    @if($cliente->pessoaJuridica->insEstadual > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal" value="{{$cliente->pessoaJuridica->insEstadual}}" class="form-control">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscEstadual" placeholder="Inscrição Estadual" class="form-control">
                    </div>
                    @endif

                    @if($cliente->pessoaJuridica->codigo > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="codigo" placeholder="{{$$cliente->pessoaJuridica->codigo}}" class="form-control">
                    </div>
                    @else
                    <div class="form-group col-sm-2">
                        <input type="text" name="codigo"  placeholder="Código" class="form-control">
                    </div>
                    @endif

                    <div class="form-group input-group col-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="natureza">Natureza</label>
                        </div>
                        <select name="natureza_pj" class="custom-select" id="natureza">
                            <option selected>{{$cliente->pessoaJuridica->natureza_pj}}</option>
                            @foreach($naturezas_juridicas as $natureza)
                            <option>{{$natureza->sigla}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM DO COLLAPSE PJ -->
        @endif
        <!-- INÍCIO DO CARD ENDEREÇO -->
        <div class="card">
            <div class="card-header">
                <strong>ENDEREÇO</strong>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div class="row">
                    @if($cliente->endereco->cep > 0)
                        <div class="form-group col-sm-3">
                            <input type="text"  value="{{$cliente->endereco->cep}}" name="cep" id="cep" class="form-control" maxlength="8">
                        </div>
                    @else
                        <div class="form-group col-sm-3">
                            <input type="text"  placeholder="Insira somente os números do CEP" name="cep" id="cep" class="form-control" maxlength="8">
                        </div>
                    @endif

                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$cliente->endereco->logradouro}}" name="logradouro" id="rua" class="form-control" maxlength="150">
                        </div>

                        <div class="form-group col-1">
                            <input value="{{$cliente->endereco->numEndereco}}" type="text" name="numEndereco" class="form-control" maxlength="10">
                        </div>

                        <div class="form-group col-3">
                            <input value="{{$cliente->endereco->complemento}}"  type="text" name="complemento" class="form-control" maxlength="50">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" value="{{$cliente->endereco->bairro}}" name="bairro" id="bairro" class="form-control" maxlength="60">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" value="{{$cliente->endereco->cidade}}" name="cidade" id="cidade" class="form-control" maxlength="60">
                        </div>

                        <div class="form-group col-sm-1">
                            <input type="text" value="{{$cliente->endereco->uf}}" name="uf" id="uf" class="form-control" maxlength="2">
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
                        @foreach($cliente->contato as $contato)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$contato->email}}" name="email" class="form-control" maxlength="100">
                        </div>

                        @if(isset($contato->telefone) > 0)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$contato->telefone}}" name="telefone" class="form-control" maxlength="13">
                        </div>
                        @else
                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Telefone" name="telefone" class="form-control" maxlength="13">
                        </div>
                        @endif

                        @if(isset($contato->celular) > 0)
                        <div class="form-group col-sm-4">
                            <input type="text" value="{{$contato->celular}}" name="celular" class="form-control" maxlength="14">
                        </div>
                        @else
                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="Celular" name="telefone" class="form-control" maxlength="14">
                        </div>
                        @endif
                        @endforeach
                    </div>
                </p>
            </div>
        <!-- FIM DO CARD CONTATO -->
        </div>

        <div class="form-group"> <!-- BOTÃO SUBMIT DO FORM -->
            <div class="col-sm-12" align="right">
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </div>
    </form>
    <script src="{{url('js/botao_pf_pj.js')}}"></script>
    <script src="{{url('js/viacep_cliente.js')}}"></script>
    <script src="{{url('js/viacep_parte_contraria.js')}}"></script>
@endsection


