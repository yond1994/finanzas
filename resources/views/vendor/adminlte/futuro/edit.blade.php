@extends('adminlte::layouts.app')

@section('main-content')

		<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-edit"></i> <h3 class="box-title">Actualizar Movimiento</h3>

          @if($data->attached)
        
              <a href="/attached/edit/{{$data->attached->id}}" class="btn btn-primary  waves-effect waves-light" style="float: right;"><i class="fa fa-paperclip"></i>  Editar Adjunto</a>
         @else
          <a href="/attached/create/{{$data->id}}" class="btn btn-primary  waves-effect waves-light" style="float: right;"><i class="fa fa-paperclip"></i>  Agregar Adjunto</a>

         @endif


            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="search-form" role="form" action = "/future/editar/{{$data->id}}" method="post"  enctype="multipart/form-data">
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
      
      </div>
    </div>

  </div>
</div>

            {{method_field('PUT')}}
             {{ csrf_field() }}
           
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Motivo</label>
                  <input required maxlength="200" type="text" name="concept" value="{{$data->concept}}" class="form-control" placeholder="Motivo">
                </div>
                 <div class="form-group">
                  <label for="exampleInputPassword1">Tipo de Movimiento</label>

                  <select class="form-control" name="type">

                    
                    @if($data->type=='add')
              <option value="add" selected>
                      Abono
                      </option>
                      <option value="out" >
                      Retiro
              </option>

                    @else
                      <option value="out" selected>
                      Retiro
              </option>
              <option value="add" >
                      Abono
                      </option>
                    @endif
                      
                    
                    
                    
                  </select>
                  
            </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Monto</label>
                
                  <?php  $num1=$data->amount.'.00'  ?>
                  <input type="text"  step="any" required maxlength="200"  data-mask="000,000,000,000,000.00" data-mask-reverse="true" step="0.01"  name="amount"  value="<?php echo $num1 ?>" class="form-control" placeholder="Monto del Movimiento">
                 
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Impuesto</label>
                  
                  <?php  $num=$data->tax.'.00'  ?>
                  <input type="text" maxlength="200" name="tax" value="<?php echo $num ?>"  data-mask="000,000,000,000,000.00"    data-mask-reverse="true" class="form-control" placeholder="Impuesto">
                
                  
                </div>
                 <div class="form-group">
                  <label for="exampleInputPassword1">N° Ref</label>
                  <input  maxlength="200" name="factura" value="{{$data->factura}}" type="text" class="form-control"  placeholder="N° Ref">
                </div>
                <div class="form-group">
                 <label for="exampleInputEmail1">cuentas</label>

                 <select class="form-control" name="account_id">
                 @foreach ($account as $accounts)
                  @if($data->account_id == $accounts->id)
                    <option value="{{$accounts->id}}" selected>
                          {{$accounts->name}}
                    </option>
                  @else
                   <option value="{{$accounts->id}}" >
                        {{$accounts->name}}
                  </option>                 
                  @endif
                  @endforeach
                     
                  </select>
                </div>


                <div class="form-group">
                 <label for="exampleInputEmail1">Categoria</label>
                 <select class="form-control" id="categorie_select" name="categories_id">

                 @foreach ($categories as $categoriess)
                 @if($data->categories_id == $categoriess->id)

                  <option value="{{$categoriess->id}}" selected >
                        {{$categoriess->name}}
                  </option>
                  @else
                  @if($categoriess->id!=1)

                   <option value="{{$categoriess->id}}" >
                        {{$categoriess->name}}
                  </option>
                  @endif
                  @endif
                  @endforeach
                     
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Fecha </label>
                  <?php  $datef= date_create($data->created_at); 
                          $fecha=date_format($datef, 'Y-m-d ');
                  ?>
                 <input required class="form-control" name="created_at" type="date" value="<?php echo date('Y-m-d',strtotime($fecha)) ?>"/>

                 
                 <!--  <input  value="{{$data->created_at}}" data-mask="0000/00/00 00:00:00" data-mask-reverse="true"   maxlength="200" name="created_at" type="text" required class="form-control"  placeholder="Fecha"> -->
                </div>
              </div>
             
            
                
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
            </form>
        </div>
												

	

@endsection
