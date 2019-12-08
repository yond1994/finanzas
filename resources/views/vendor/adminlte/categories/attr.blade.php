@extends('adminlte::layouts.app')
@section('main-content')

		<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-code-fork"></i><h3 class="box-title">Crear ATTR</h3>
              <div>
              	<button class="btn btn-primary pull-right" type="button" id="btn_add_attr">
              		<i class="fa fa-plus"></i>
              	</button>
                 <button class="btn btn-primary pull-right" type="button" id="buttonremove">
                  <i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/categories/categories/attr/{{$categorie->id}}" method = "post">
            {{ csrf_field() }}	
              
                <div class="form-group col-sm-6">
                  <label for="exampleInputPassword1">Nombre</label>
                  <input required maxlength="200" name="name_[]" type="text"   class="form-control"  placeholder="Valor">
                </div>
                <div class="form-group col-sm-6">
                  <label for="exampleInputPassword1">Valor</label>
                  <input required maxlength="200" name="value_[]" type="text"   class="form-control"  placeholder="Valor">
                </div>
              <div class="box-body" id="list_attr">
              </div>
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
                </form>

              <div class="box-footer">
             
                <a href="/categories/categories"> <button class="btn btn-primary pull-right">Seguir Sin Guardar</button></a>
              </div>
                     
        </div>
@endsection
