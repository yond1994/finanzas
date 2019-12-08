@extends('adminlte::layouts.app')




@section('main-content')

		<div class="box box-primary">
            <div class="box-header with-border">
             <i class="fa fa-bank"></i><h3 class="box-title">Crear Cuenta</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/account/save" method = "post">
            {{ csrf_field() }}	
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre del banco</label>
                  <input type="text" name="name" required maxlength="200"  class="form-control" placeholder="Nombre del banco">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Numero de cuenta</label>
                  <input name="number" type="number" required maxlength="200"  class="form-control"  placeholder="Numero de cuenta">
                </div>
                <div class="form-group">
                	<label for="exampleInputPassword1">Tipo de Cuenta</label>

                	<select class="form-control" required  name="type">

                		<option value="corriente">
                		
                			Corriente
                		</option>
                		<option value="ahorro">
                			Ahorro
                		</option>
                	</select>
	                
		        </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
        </div>
												

	

@endsection
