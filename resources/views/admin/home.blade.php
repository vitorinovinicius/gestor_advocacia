@extends('adminlte::page')

@section('title', 'Painel de Controle')

@section('content_header')
    <h1>Painel de Controle</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>@if(array($clientes) > 0){{count($clientes)}}@endif</h3>
                <p>@if(count($clientes) <= 1) Cliente @else Clientes @endif</p>
            </div>
            <div class="icon">
                <i class="fas fa-user">
                </i>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>@if(array($compromissos) > 0){{count($compromissos)}}@endif</h3>
                <p>@if(count($compromissos) <= 1) Compromisso @else Compromissos @endif</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-alt">
                </i>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>@if(array($processos) > 0){{count($processos)}}@endif</h3>
                <p>@if(count($processos) <= 1) Processo @else Processos @endif</p>
            </div>
            <div class="icon">
                <i class="fas fa-folder">
                </i>
            </div>
        </div>
    </div>
</div>
@endsection
