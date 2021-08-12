@extends('adminlte::page')

@section('title', 'TESTE')

@section('content_header')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <h1>Novo teste</h1>

@endsection

@section('content')

@if($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>
        <ul>
            <h4><i class="icon fas fa-ban"></i> Ocorreu um erro. </h4>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<style type="text/css">
    .box{
        display:none;
    }
</style>
<div class="card col-sm-8">
    <input type="radio" name="lom" value="one"> first
    <input type="radio" name="lom" value="two"> second
    <input type="radio" name="lom" value="three"> third
</div>

<div class="box one"><h2>1 selecionado</h2></div>
<div class="box two"><h2>2 selecionado</h2></div>
<div class="box three"><h2>3 selecionado</h2></div>

<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('input[type="radio"]').click (function() {
            var inputValue = $(this).attr("value");
            var targetBox = $("."+inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        })
    })
</script>

@endsection
