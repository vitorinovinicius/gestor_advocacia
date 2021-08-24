@extends('adminlte::page')

@section('title', 'TESTE')

@section('content_header')
<script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/mask_number.js')}}"></script>

    <h1>Novo teste</h1>

@endsection

@section('content')
<form name="formulario" method="post">
    <label>CPF</label>
    <input type="text" name="cpf" id="cpf" />
    <br />
    <label>CNPJ</label>
    <input type="text" name="cnpj" id="cnpj" />
    <br />
    <label>RG</label>
    <input type="text" name="rg" id="rg" />
    <br />
    <label>Telefone</label>
    <input type="text" name="telefone" id="telefone" />
    <br />
    <label>Celular</label>
    <input type="text" name="celular" id="celular" />
    <br />
    <label>Salário</label>
    <input type="text" name="salario" id="salario" />
    <br />
    <label>CEP</label>
    <input type="text" name="cep" id="cep" />
    <br />
    <label>Data de Nascimento</label>
    <input type="text" name="dataNascimento" id="dataNascimento" />
    <br />
    <label>Placa</label>
    <input type="text" name="placa" id="placa" />
    <br />
    <label>Código AA.aaa.9000</label>
    <input type="text" name="codigo" id="codigo" />
    <br />
    <input type="submit" name="enviar" value="Enviar" />
</form>
@endsection
