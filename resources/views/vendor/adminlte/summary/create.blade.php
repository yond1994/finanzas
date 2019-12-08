@extends('adminlte::layouts.app')

@section('main-content')


		<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart"></i><h3 class="box-title">Nuevo Movimiento</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="search-form" role="form" action = "/summary/save" method = "post"  enctype="multipart/form-data">
            {{ csrf_field() }}	

<div  id="modal" class="modal" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="closemodal" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Subcategorias</h4>
      </div>
      <div class="modal-body" id="res_ajax">
      
      </div></br>
      <div class="modal-footer">
      <button style=" margin: 15px;" type="button" id="closemodal3" class="btn btn-default" data-dismiss="modal">Ok</button>
      
      </div>
    </div>

  </div>
</div>

<div  id="modal1" class="modal" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="closemodal1" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Fecha de producto</h4>
      </div>
      <div class="modal-body" id="res_ajax1">
      
      </div></br>
      <div class="modal-footer">

      <button  style=" margin: 15px;" type="button" id="closemodal2" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>

  </div>
</div>
            <div class="box-body">
              	<div class="form-group">
                	<label for="exampleInputPassword1">Tipo de Movimiento</label>
                	<select class="form-control " id="type_movimiento" name="type">
                   <option  value="" >
                      Seleccione Tipo
                    </option>
                  @if($type=="add")
                		<option  value="add"  selected>
                			Abono
                		</option>
                  @elseif($type=="out")  
                		<option value="out" selected>
                			Retiro
                		</option>
                  @else 
                    <option  value="add" >
                      Abono
                    </option>
                    <option  value="out" >
                      Retiro
                    </option>
                  @endif
                	</select>
		        </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Concepto</label>
                  <input required maxlength="200" type="text" name="concept"  class="form-control" placeholder="motivo del movimiento">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Monto</label>
                  <input required maxlength="200" name="amount" type="text"   data-mask="000,000,000,000,000.00" data-mask-reverse="true"    class="form-control"  placeholder="Monto">
                </div>
                <div class="form-group">
                  	<label for="exampleInputPassword1">Impuesto</label>
                  	<input required maxlength="200" name="tax" type="text" data-mask-reverse="true"   class="form-control" data-mask="000,000,000,000,000.00"  placeholder="Impuesto">  
                </div>
                 <div class="form-group">
                  <label for="exampleInputPassword1">N° Ref</label>
                  <input  maxlength="200" name="factura" type="text"   class="form-control"  placeholder="N° de control">
                </div>
                <div class="form-group">
                	<label for="exampleInputPassword1">Categorias</label>
						 
                	<select required class="form-control" name="categories_id" id="categorie_select">
                  <option class="" value="">Seleccione Categoria</option>
                	@foreach ($data2 as $datas2)	

                     
                    @if($datas2->id!=1)
                   
                		<option class="attr-{{$datas2->type}}" value="{{ $datas2->id }}">
                   
                			{{ $datas2->name }}
                      
                		</option>
                      @endif
                	@endforeach
                	</select>
	                
		        </div>
             <div class="form-group">
                  <label for="exampleInputPassword1">Productos</label>
             
                  <select  class="form-control" name="tours_id" id="tours_select">
                  <option class="" value="">No Aplica</option>
                  @foreach ($tours as $tour)       
                    <option class="attr-{{$tour->price}}" value="{{ $tour->id }}">
                      {{ $tour->name }} 
                    </option>
                  @endforeach
                  </select>
                  
            </div>
            <div class="form-group hidden" id="res_ajax">
            </div>
		        <div class="form-group">
                	<label for="exampleInputPassword1">Cuentas</label>
						 
                	<select  required id="origen" class="form-control" name="account_id">
                    <option value="">Seleccione Cuenta</option>
                	@foreach ($data as $datas)		
                		<option value="{{ $datas->id }}">
                    
                			{{ $datas->name }}
                  
                		</option>
                	@endforeach
                	</select>
	                 <div class="form-group hidden" id="res_origen"></div>
		          </div>
              <div class="form-group">
                <div class=" col-md-6">
                    <label for="exampleInputPassword1">Fecha</label>
                    <input  maxlength="200" name="created_at" type="date" required class="form-control"  placeholder="Fecha">
                  </div>
                </div>
                <div class=" col-md-6">
                    <label for="exampleInputEmail1">Cargar Adjunto</label>
                    <input type="file"  name="path"  class="form-control" placeholder="Nombre del archivo">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>


        </div>

	

@endsection
