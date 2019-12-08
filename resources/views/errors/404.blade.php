@extends('adminlte::layouts.errors')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.pagenotfound') }}
@endsection

@section('main-content')
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="#"><b>oops! no  encontrado </a>
    </div>
    <!-- User name -->
    

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
    <!-- lockscreen image -->
        <div class="lockscreen-image">
            <i class="fa fa-exclamation-triangle fa-5x"></i>
        </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
        <div class="lockscreen-credentials">
        <div class="input-group">
            <center><label  class="form-control" >Ir al pantalla principal</label></center>

        <div class="input-group-btn">
            <a href="/home"><button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button></a>
        </div>
    </div>
        </div>
        <!-- /.lockscreen credentials -->
</div>
        <!-- /.lockscreen-item -->
        <label>
           El sitio donde quieres ingresar no existe o esta restringido
        </label>
    <div class="text-center">
        <a href="login.html"></a>
    </div>
    <div class="lockscreen-footer text-center">
      
    </div>
</div>
@endsection