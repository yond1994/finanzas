@extends('adminlte::layouts.app')

@section('main-content')


		<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart"></i><h3 class="box-title">Transferir entre cuentas</h3>
            </div >
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/transfer/save" method = "post">
           
             
          
            
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
                      @foreach ($data as $datas)    
                        <option  value="{{ $datas->id }}">
                            {{ $datas->name}}   

                      </option>
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
                        @foreach ($data as $datas)    
                           <option value="{{ $datas->id }}">
                              {{ $datas->name}}  
                              </p>  
                          </option>
                        @endforeach
                        </select>
                      <div class="form-group hidden" id="res_destino"></div>
                  </div>

            </div>     
            

                  <div class="form-group">

                    <label for="exampleInputPassword1">Monto</label>
                    <input id="amount" autofocus="autofocus" required  name="amount" type="text"   data-mask="000,000,000,000,000.00" max="" data-mask-reverse="true"    class="form-control"  placeholder="Monto">
                  </div>
                   

                   <div class="form-group">
                    <label for="exampleInputPassword1">Fecha</label>
                    <input required maxlength="200" name="created_at" placeholder="fecha" type="date" class="form-control" >
                  </div> 
                  
                  <input name="categories_id"  value="1" type="hidden"  >
                  
                   
              
  		        
                <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Fecha</label>
                    <input  maxlength="200" name="created_at" type="date" required class="form-control"  placeholder="Fecha">
                  </div>
                </div> -->
                <div class="box-footer">
                <center>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  </center>
                </div>
              </form>
          

        </div>






@endsection
