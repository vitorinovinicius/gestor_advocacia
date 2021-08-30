@extends('adminlte::page')

@section('title', 'Processos')

@section('content_header')
    <h1>
        Novo processo
        <a href="{{route('processo.index')}}" class="btn btn-sm btn-success">
            Voltar
        </a>
    </h1>
@endsection

@section('content')
    <form action="{{ route('processo.store') }}" method="POST" onsubmit="return confirm('Verique todos os campos antes de salvar!')" >
        @csrf
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
                            <div class="form-group input-group col-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="cliente">Cliente</label>
                                </div>
                                @foreach($clientes as $cliente)
                                <input name="id"class="custom-select" id="cliente" list="NaturezaOptions" autocomplete="off">
                                    <datalist id="NaturezaOptions">
                                        <option selected></option>
                                        <option value="{{$cliente->id}}">@if($cliente->nome_empresa){{$cliente->nome_empresa}}
                                                @else{{$cliente->nome}}
                                                @endif
                                        </option>
                                        @endforeach
                                    </datalist>
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
                                <input type="date"  placeholder="Data de Distribuição" name="dtDistribuicao" class="form-control">
                            </div>

                            <div class="form-group col-sm-2">
                                <input type="text"  placeholder="Situação do contrato" name="situacaoContrato" class="form-control">
                            </div>

                            <div class="form-group col-sm-2">
                                <input type="datetime"  value="{{date("YmdHis", time())}}" name="numProcesso" class="form-control">
                            </div>

                            <div class="form-group col-sm-6">
                                <input type="text"  placeholder="Situação do contrato" name="situacaoContrato" class="form-control">
                            </div>

                            <div class="form-group col-sm-6">
                                <input type="text"  placeholder="Advogado da parte contrária" name="advContraria" class="form-control">
                            </div>

                            <div class="form-group col-sm-12">
                                <textarea class="form-control"type="text"  placeholder="Título" name="titulo"></textarea>
                            </div>
                        </div>
                    </p>
                </div><!-- FIM DO COLLAPSE PARTE CONTRÁRIA -->

            </div>
        </div>
        <div class="form-group"> <!-- BOTÃO SUBMIT DO FORM -->
            <div class="col-sm-12" align="right">
                <input type="submit" class="btn btn-success" value="Cadastrar">
            </div>
        </div>
    </form>
@endsection
@section('footer')
@endsection
