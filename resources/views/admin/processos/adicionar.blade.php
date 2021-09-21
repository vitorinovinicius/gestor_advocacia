
@php
date_default_timezone_set('America/Sao_Paulo')
@endphp

@extends('adminlte::page')

@section('title', 'Processos')

@section('content_header')
@section('css')
    <link rel="stylesheet" href="{{url('css/app.css')}}">
@endsection
<script type="text/javascript" src="{{url('js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/mascara_processo.js')}}"></script>

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
            <div class="card cadastro parte_contraria">
                <div class="card-header">
                    <strong>PASTA DO PROCESSO</strong>
                </div>
                <div class="card-body col-12">
                    <p class="card-text">
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <input type="text"  placeholder="Número da pasta" readonly name="pasta" class="form-control" value="{{'Proc - '.date('YmdHis', time()).rand(000001, 999999)}}">
                                <small class="form-text text-muted col-md-12">Número da pasta</small>
                            </div>

                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Número da inicial" name="numInicial" class="form-control">
                                <small class="form-text text-muted col-md-12">Número da inicial</small>
                            </div>

                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Número principal" name="numPrincipal" class="form-control">
                                <small class="form-text text-muted col-md-12">Número principal</small>
                            </div>

                            <div class="form-group col-sm-2">
                                <input type="date" name="dtDistribuicao" class="form-control">
                                <small class="form-text text-muted col-md-12">Data de distribuição</small>
                            </div>

                            <div class="form-group col-sm-4">
                                <input type="text"  placeholder="Número do processo" name="numProcesso" class="form-control" id="masc_processo">
                                <small class="form-text text-muted col-md-12">Número do processo</small>
                            </div>

                            <div class="form-group input-group col-4">
                                <input name="tipoContrato" class="custom-select" list="situacaoContratoOptions" autocomplete="off">
                                <datalist id="situacaoContratoOptions">
                                <option selected></option>
                                <option>Contrato de honorários</option>
                                <option>Contrato Contencioso</option>
                                </datalist>
                                <small class="form-text text-muted col-md-12">Tipo de contrato</small>
                            </div>

                            <div class="form-group input-group col-4">
                                <input name="parteContraria" class="custom-select" list="parteContrariaOptions" autocomplete="off">
                                <datalist id="parteContrariaOptions"></i>
                                <option selected></option>
                                <option>Bradesco S.A</option>
                                <option>Sadia S.A</option>
                                <option>José Armando Videira</option>
                                </datalist>
                                <button type="button" class="btn btn-md btn-success" data-toggle="modal"
                                        data-toggle="tooltip" data-placement="top" title="Adicionar parte contrária"
                                        data-target="#parte_contraria">
                                        <i class="fas fa-plus"></i>
                                </button>
                                <small class="form-text text-muted col-md-12">Parte contrária</small>

                                <!-- Modal -->
                                <div class="modal fade" id="parte_contraria" tabindex="-1" aria-labelledby="parte_contrariaLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="parte_contrariaLabel">Adicionar parte contrária</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="cadastro_parte_contraria"></div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success">Salvar</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group input-group col-4">
                                <input name="advContrario" class="custom-select" list="advContrarioOptions" autocomplete>
                                <datalist id="advContrarioOptions">
                                <option selected></option>
                                <option>Juan Flores Garcia</option>
                                <option>Roberto da Silva Santos</option>
                                <option>Alberto de Oliveira Aguilar</option>
                                </datalist>
                                <small class="form-text text-muted col-md-12">Advogado da parte contrária</small>
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

