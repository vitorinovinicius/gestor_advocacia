@extends('adminlte::page')

@section('title', 'Processos')

@section('content_header')
    <h1>
        Novo processo
        <a href="{{route('processo.index)}}" class="btn btn-sm btn-success">
            Voltar
        </a>
    </h1>
@endsection
@section('content')
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
                    </p>
                </div><!-- FIM DO COLLAPSE PARTE CONTRÁRIA -->

                <div class="card-header">
                    <strong>ENDEREÇO</strong>
                </div>
                <div class="card-body col-12">
                    <p class="card-text">
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <input type="text"  placeholder="Insira somente os números do CEP." name="cep" id="cep2" class="form-control">
                            </div>

                            <div class="form-group col-sm-4">
                                <input type="text" placeholder="Logradouro" name="logradouro" id="rua2" class="form-control">
                            </div>

                            <div class="form-group col-1">
                                <input type="text" placeholder="Número" name="numEndereco" class="form-control">
                            </div>

                            <div class="form-group col-3">
                                <input type="text" placeholder="Complemento"  name="complemento" class="form-control">
                            </div>

                            <div class="form-group col-sm-3">
                                <input type="text" placeholder="Bairro" name="bairro" id="bairro2" class="form-control">
                            </div>

                            <div class="form-group col-sm-3">
                                <input type="text" placeholder="Cidade" name="cidade" id="cidade2" class="form-control">
                            </div>

                            <div class="form-group col-sm-1">
                                <input type="text" placeholder="Estado" name="uf" id="uf2" class="form-control">
                            </div>
                        </div>
                    </p>
                </div><!-- FIM DO COLLAPSE ENDEREÇO PARTE CONTRÁRIA -->
            </div>
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
