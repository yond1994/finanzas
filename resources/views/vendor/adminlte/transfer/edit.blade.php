@extends('adminlte::layouts.app')

@section('main-content')


		<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart"></i><h3 class="box-title">Editar Transferencia entre cuentas</h3>
            </div >
            <!-- /.box-header -->
            <!-- form start -->
           <form id="search-form" role="form" action = "/transfer/editar/{{$add->id_transfer}}" method="post"  enctype="multipart/form-data">
            {{method_field('PUT')}}
             {{ csrf_field() }}
           
             
          
            
           
            <div class="col-md-6">
              <div class="box-body ">
                	<div class="form-group">
                    <h4>transferir dinero desde:</h4>
                  </div>
  		        </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Seleccione Origen </label>
               
                    <select required="" autofocus="autofocus"  id="origen" autofocus="autofocus" class="form-control" name="origen">
                      <option value="" selected>Seleccion</option>

                    
                      @foreach ($account as $datas) 

                      @if($add->account_id==$datas->id)   
                        <option selected value="{{ $datas->id }}">{{ $datas->name}} </option>
                      @else
                          <option  value="{{ $datas->id }}">{{ $datas->name}} </option>
                      @endif
                        
                      @endforeach
                    </select>
                    <div class="form-group hidden" id="res_origen"></div>
                  </div>
                  
            </div>
           
            <div class="col-md-6">
                <div class="box-body ">
                  <div class="form-group">
                    <h4>Para:</h4>
                  </div>
                </div>
                  <div class="form-group">
                    <label  for="exampleInputPassword1">Seleccione Destino </label>
               
                        <select  required  id="destino"  class="form-control" name="destino">
                        <option value="" selected>Seleccion</option>
                      @foreach ($account as $datas) 

                      @if($out->account_id==$datas->id)   
                        <option selected value="{{ $datas->id }}">{{ $datas->name}} </option>
                      @else
                        <option  value="{{ $datas->id }}">{{ $datas->name}} </option>
                      @endif
                       
                      @endforeach
                        </select>
                      <div class="form-group hidden" id="res_destino"></div>
                  </div>

            </div>     
            

                  <div class="form-group">
                  <label for="exampleInputPassword1">Monto</label>

                  

                    
                  <?php  $num1=$out->amount.'.00'  ?>
                     <input id="amount" autofocus="autofocus" required value="<?php echo $num1 ?>"  name="amount" type="text"   data-mask="000,000,000,000,000.00" max="" data-mask-reverse="true"    class="form-control"  placeholder="Monto">

              
                  </div>
                   

                  <div class="form-group">
                  <label for="exampleInputPassword1">Fecha </label>
                  <?php  $datef= date_create($out->created_at); 
                          $fecha=date_format($datef, 'Y-m-d ');
                  ?>
                 <input required class="form-control" name="created_at" type="date" value="<?php echo date('Y-m-d',strtotime($fecha)) ?>"/>

              
                </div>
                  
                  <input name="categories_id"  value="1" type="hidden"  >
                  
                   
              
  		        
                <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Fecha</label>
                    <input  maxlength="200" name="created_at" type="date" required class="form-control"  placeholder="Fecha">
                  </div>
                </div> -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
          

        </div>






@endsection
