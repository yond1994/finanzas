@extends('adminlte::layouts.app')




@section('main-content')

		<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bank"></i><h3 class="box-title">Editar Cuenta</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/account/editar/{{$data->id}}" method="post">
            {{method_field('PUT')}}
             {{ csrf_field() }}
           
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre del banco</label>
                  <input type="text" required maxlength="200" name="name" value="{{$data->name}}" class="form-control" placeholder="Nombre del banco">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Número de cuenta</label>
                  <input name="number" required maxlength="200" type="number" value="{{$data->number}}"  class="form-control"  placeholder="Numero de cuenta">
                </div>
                <div class="form-group">
                	<label  for="exampleInputPassword1">Tipo de Cuenta</label>

                	<select  required  class="form-control" name="type">

                		
                		@if($data->type=='ahorro')
							<option value="ahorro" selected>
                			ahorro
                			</option>
                			<option value="corriente" >
                			corriente
							</option>

                		@else
                			<option value="corriente" selected>
                			corriente
							</option>
							<option value="ahorro" >
                			ahorro
                			</option>
                		@endif
                			
                		
                		
                		
                	</select>
	                
		        </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
              </div>
            </form>
        </div>
												

	

@endsection
