@extends('adminlte::page')

@section('title', 'Editar cliente ')

@section('content_header')
<link rel="stylesheet" href="{{url('css/app.css')}}">
<script src="{{url('js/jquery.min.js')}}"></script>
    <h1>
            Editar dados do cliente
        <a href="{{route('cadastro.index')}}" class="btn btn-sm btn-success">
        <i class="fas fa-reply"></i>
            Voltar
        </a>
    </h1>
@endsection

@section('content')
    <form action="{{ route('cadastro.store') }}" method="POST" >
        @csrf
        @if($cliente->nome > 0)
        <!-- INÍCIO DA PESSOA NATURAL -->
        <div class="card cadastro natural">
            <div class="card-header">
                <strong>PESSOA NATURAL</strong>
            </div>
            <div class="card-body col-12">
                <p class="card-text">
                <div class="row">
                    <div class="form-group col-6">
                        <input type="text" name="nome" placeholder="{{$cliente->nome}}" class="form-control">
                    </div>
                    <div class="form-group col-sm-3">
                        <input type="text" name="cpf" placeholder="{{$cliente->pessoaFisica->cpf}}" class="form-control">
                    </div>

                    <div class="form-group col-sm-3">
                        <input type="text" name="pis" placeholder="{{$cliente->pessoaFisica->pis}}" class="form-control">
                    </div>

                    <div class="form-group col-sm-3">
                        <input type="text" name="numCtps" placeholder="{{$cliente->pessoaFisica->numCtps}}" class="form-control">
                    </div>

                    <div class="form-group col-sm-2">
                        <input type="text" name="serieCtps" placeholder="{{$cliente->pessoaFisica->serieCtps}}" class="form-control">
                    </div>

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

                    <div class="form-group col-sm-4">
                        <input type="text" placeholder="{{$cliente->pessoaFisica->tituloEleitor}}" name="tituloEleitor" class="form-control">
                    </div>

                    <div class="form-group col-sm-4">
                        <input type="text" placeholder="{{$cliente->pessoaFisica->idtCivil}}" name="idtCivil" class="form-control">
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
                        <input type="date" placeholder="Data de expedição" name="dtExpedicao" class="form-control" value="{{$cliente->pessoaFisica->dtExpedicao}}">
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
                        <input type="text" placeholder="{{$cliente->pessoaFisica->nomeMae}}" name="nomeMae" class="form-control">
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
                        <input type="text" name="nome_empresa" placeholder="{{$cliente->nome_empresa}}" class="form-control @error('nome_empresa') is-invalid @enderror">
                            @error('nome_empresa')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                            @enderror
                    </div>

                    <div class="form-group col-sm-3">
                        <input type="text" name="numero" placeholder="{{$cliente->pessoaJuridica->numero}}" class="form-control">
                    </div>

                    @if($cliente->pessoaJuridica->inscMunicipal > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal" placeholder="{{$cliente->pessoaJuridica->inscMunicipal}}" class="form-control">
                    </div>
                    @else
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal" placeholder="Inscrição Municipal" class="form-control">
                    </div>
                    @endif

                    @if($cliente->pessoaJuridica->insEstadual > 0)
                    <div class="form-group col-sm-4">
                        <input type="text" name="inscMunicipal" placeholder="{{$cliente->pessoaJuridica->insEstadual}}" class="form-control">
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
                        <div class="form-group col-sm-3">
                            <input type="text"  placeholder="{{substr_replace($cliente->endereco->cep, '-', 5, 0)}}" name="cep" id="cep" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="{{$cliente->endereco->logradouro}}" name="logradouro" id="rua" class="form-control">
                        </div>

                        <div class="form-group col-1">
                            <input placeholder="{{$cliente->endereco->numEndereco}}" type="text" name="numEndereco" class="form-control">
                        </div>

                        <div class="form-group col-3">
                            <input placeholder="{{$cliente->endereco->complemento}}"  type="text" name="complemento" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" placeholder="{{$cliente->endereco->bairro}}" name="bairro" id="bairro" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" placeholder="{{$cliente->endereco->cidade}}" name="cidade" id="cidade" class="form-control">
                        </div>

                        <div class="form-group col-sm-1">
                            <input type="text" placeholder="{{$cliente->endereco->uf}}" name="uf" id="uf" class="form-control">
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
                            <input type="text" placeholder="{{$contato->email}}" name="email" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="@if($contato->telefone > 0){{$contato->telefone}} @else Telefone @endif" name="telefone" class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" placeholder="@if($contato->celular > 0){{$contato->celular}} @else Celular @endif" name="celular" class="form-control">
                        </div>
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


