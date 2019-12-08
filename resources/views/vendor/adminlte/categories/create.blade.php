@extends('adminlte::layouts.app')
@section('main-content')

		<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-code-fork"></i><h3 class="box-title">Crear Categoria</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/categories/save" method = "post">
            {{ csrf_field() }}	
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre de la categoria</label>
                  <input type="text" required maxlength="200" name="name"  class="form-control" placeholder="Nombre de la categoria">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Descripción</label>
                  <input required maxlength="200" name="description" type="text"   class="form-control"  placeholder="descripción de la categoria">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tipo de Categoria</label>
                  <select name="type" class="form-control">
                    <option value="add" >Categoria de entrada</option>
                    <option value="out" >Categoria de Retiro</option>
                  </select>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
        </div>
@endsection
