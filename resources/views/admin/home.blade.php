@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@section('css')
    <link rel="stylesheet" href="{{url('css/app.css')}}">
@endsection
    <h1>
        Dashboard
        <a href="{{route('home')}}" class="btn btn-sm btn-success">
            Site
        </a>
    </h1>

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
                <i class=">@if(count($clientes) <= 1) fas fa-user @else fas fa-users @endif">
                </i>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>@if(array($servicos) > 0){{count($servicos)}}@endif</h3>
                <p>@if(count($servicos) <= 1) Serviço @else Serviços @endif</p>
            </div>
            <div class="icon">
                <i class="fas fa-hands-helping">
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
                <i class="fas fa-gavel">
                </i>
            </div>
        </div>
    </div>
</div>
@endsection
