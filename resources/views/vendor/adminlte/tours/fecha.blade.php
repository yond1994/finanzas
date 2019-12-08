@extends('adminlte::layouts.app')

@section('main-content')


<?php 
 if(isset($_GET['dias'])) {

       $dias = $_GET["dias"];
		$startf="";
            if($dias==30){
               $startf=date('Y-m-d',strtotime('today - 30 days'));
            }
            if($startf==15){
               $startf=date('Y-m-d',strtotime('today - 15 days'));
            }
            if($dias==7){
              $startf=date('Y-m-d',strtotime('today - 7 days'));
            }
            if($dias==1){
              $startf=date('Y-m-d',strtotime('today'));
            }

              $finishf= $startf=date('Y-m-d',strtotime('today'));
      }else {
          $finishf= '';
          $startf= '';
      }

if(isset($_GET['start'])) {
     $startf= $_GET["start"];
} else {
    $startf= "";
}

if(isset($_GET['finish'])) {
    $finishf= $_GET["finish"];
} else {
     $finishf= '';
}

if(isset($_GET['dias'])) {
     $diasf= $_GET["dias"];
} else {
    $diasf = '';
}

if(isset($_GET["tipo"])) {
     $tipof= $_GET["tipo"];
} else {
    $tipof= "";
}
if(isset($_GET["cuentas"])) {
      $cuentasf= $_GET["cuentas"];
} else {
   $cuentasf= "";
}
if(isset($_GET["tipo"])) {
     $tipof= $_GET["tipo"];
} else {
    $tipof= "";
}

 if(isset($_GET["categoria"])) {
     $categoriaf= $_GET["categoria"];
} else {
    $categoriaf= "";
}

if(isset($_GET['id_attr'])) {
    $id_attrf= $_GET["id_attr"];
} else {
    $id_attrf = '';
}



if(isset($_GET['tf'])) {
    $id_tf= $_GET["tf"];
} else {
    $id_tf = '';
}
if(isset($_GET['id_attr_tours'])) {
    $id_attr_tours= $_GET["id_attr_tours"];
} else {
    $id_attr_tours = '';
}

$url="?start=".$startf."&finish=".$finishf."&dias=".$diasf."&tipo=". $tipof."&cuentas=".$cuentasf."&categoria=".$categoriaf."&id_attr=".$id_attrf."&id_attr_tours=".$id_attr_tours."&tf=".$id_tf ."";

?>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 ">
				<div class="box-body ">
					<div class="container-fluid spark-screen">
						<div class="row">
							<div class="col-md-12">
								<div class="box box-admin-border">
									<div class="box-header with-border naranja">
										<i class="fa fa-bar-chart"></i><h3 class="box-title"><b>{{$nametour->name}} / Salida: 
										@if( $namefecha->date )
								    	<?php  $datef= date_create($namefecha->date); 
										 $fecha=date_format($datef, "F j, Y");
								    	?>
										@endif	
										{{$fecha}}</b></h3>

									 
									 
									</div>
									
								<form action="" method = "get">
										<div class="col-sm-12 add_top_10">
										
											<div class="form-group col-sm-6">
												<input type="date" name="start"   placeholder="Fecha Inicio" class="form-control">
											</div>
											<div class="form-group col-sm-6">
												<input type="date" name="finish" placeholder="Fecha Final"  class="form-control">
											</div>
										</div>

										<div class="col-sm-12 add_top_1">
									
											<div class="col-sm-2 add_top_1  ">
														<select class="form-control"  type="text" name="dias" >
															<option value="">Filtrar Por dias</option>
															<option value="30">Ultimo mes</option>
															<option value="15">Ultimos 15 dias</option>
															<option value="7">Ultimos 7 dias</option>
															<option value="1">Hoy</option>
														</select>
											</div>
											
											
											
											<div class="col-sm-2 add_top_1">
														<select class="form-control"  type="text" name="tipo" >
															<option value="">Tipo de movimiento</option>
															<option value="1">Transferencia</option>
															<option value="add">Abonos</option>
															<option value="out">Retiros</option>
																							
														</select>
											</div>

											<div class="col-sm-2 add_top_1">
														<select class="form-control"  type="text" name="cuentas" >
															<option value="">Cuentas</option>
															@foreach ($data as $datas)
															<option value="{{ $datas->id }}">{{ $datas->name }}</option>
															@endforeach
														</select>
											</div>

											<div class="col-sm-2 add_top_1">
															<select class="form-control" name="tf" id="tours_select">
															<option value="">Tours</option>
										                	@foreach ($tours as $tour)	
										                		<option class="attr-{{$tour->price}}" value="{{$tour->id }}">
										                			{{ $tour->name }}
										                		</option>
										                	@endforeach
										                	</select>
										                	<div  id="modal1" class="modal" >
															  <div class="modal-dialog">
															    <!-- Modal content-->
															    <div class="modal-content">
															      <div class="modal-header">
															        <button type="button" id="closemodal1" class="close" data-dismiss="modal">&times;</button>
															        <h4 class="modal-title">Fecha De Tours</h4>
															      </div>
															      <div class="modal-body" id="res_ajax1">
															      
															      </div></br>
															      <div class="modal-footer">
															       <button style=" margin: 15px;" type="button" id="closemodal2" class="btn btn-default" data-dismiss="modal">Ok</button>
															      </div>
															    </div>

															  </div>
															</div>
		     
         


											</div>





											<div class="col-sm-2 add_top_1">
															<select class="form-control" name="categoria" id="categorie_select">
															<option value="">Categorias</option>
										                	@foreach ($data2 as $datas2)	
										                	@if($datas2->name!="transferencia")	
										                		<option class="attr-{{$datas2->type}}" value="{{ $datas2->id }}">
										                			{{ $datas2->name }}
										                		</option>
										                	@endif
										                	@endforeach
										                	</select>


												
                
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
		     
         


											</div>
											<div class="col-sm-2 add_top_1  ">
															 <button type="submit" class="btn btn-sm  btn-default form-control "><i class="fa fa-filter"></i></button>
											</div>	
								
<!-- <div   class=" col-sm-12">
			   <div   class="hidden" id="res_ajax">

		       </div>
</div> -->
									</div>
								</form>

									
									<div class="box-body responsive-table  ">

										<div id="lista_item_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div class="row ">
												<div class="col-sm-12 " >
													
													<table  id="summary" class="display" cellspacing="0" width="100%">
						                                <thead>
						                                   	<tr>
																<th>ID</th>
																<th>Fecha </th>
																<th>Tipo</th>
																<th>Monto</th>
																<th>Impuesto</th>
																<th>Motivo</th>
																<th>Cuenta</th>
																<th>Categorias</th>
																<th>Acción</th>
															</tr>
						                                </thead>
						                                <tbody>
															    @foreach ($summary as $summarys)
															    <tr>
															    	<td>{{ $summarys->id }}</td>
															    	@if( $summarys->created_at )
															    	<?php  $datef= date_create($summarys->created_at); 
																	 $fecha=date_format($datef, 'd-m-Y ');
															    	?>
																	@endif
															    	<td>{{ $fecha }}</td> 
															    	@if($summarys->type=="add")
															    	<td>Abono <small class="label pull-right bg-primary">
																		@if($summarys->id_transfer!="")
																		<i class="fa fa-exchange"></i>
																		@else
																		<i class="fa fa-sort-up"></i>
																		@endif
															    	</small></td>
															    	@elseif($summarys->type=="out")
																		<td>Retiro <small class="label pull-right bg-red"> 
																		@if($summarys->id_transfer!="")
																		<i class="fa fa-exchange"></i>
																		@else
																		<i class="fa fa-sort-desc"></i>
																		@endif
																	</small></td>
															    	@endif
															        <td>{{ number_format($summarys->amount, 2, '.', ',') }} {{$divisa->value}}</td>
															        <td>{{ number_format( $summarys->tax, 2, '.', ',') }}</td>
															        <td>{{ $summarys->concept }}</td>
															        <td>{{ $summarys->name_account }}</td>
															        <td>{{ $summarys->name_categories }}</td>
															        <td>
															        	@if($summarys->id_transfer!="")
																			<?php $elimina="eliminart";
																				$id=$summarys->id_transfer;
																			 ?>
															        	@else
																			<?php $elimina="eliminar";
																				$id=$summarys->id;
																			 ?>
															        	@endif
																 		<form role="form" action = "/summary/<?php echo $elimina ?>/<?php echo $id ?>" method="post"  enctype="multipart/form-data">
							                                          			{{method_field('DELETE')}}
							                                          			{{ csrf_field() }}
							                                          		<a class="btn btn-sm btn-default"  href="/detalle/detalle/{{ $summarys->id }}"><i class="fa fa fa-eye"></i></a> 
																			@if($summarys->attached)
							                                          		 <a class="btn btn-sm btn-default" target="_blank" href="/download/{{$summarys->attached->id}}"><i class="fa fa-paperclip"></i></a>
																			@endif

							                                       			@if($summarys->id_transfer!="")
																				<a class="btn btn-sm btn-default" href="/transfer/edit/{{ $summarys->id_transfer }}"><i class="fa fa-edit"></i></a>
																        	@else
																				<a class="btn btn-sm btn-default" href="/summary/edit/{{ $summarys->id }}"><i class="fa fa-edit"></i></a>
																        	@endif
							                                      			
							                                      			<button  onclick='if(confirmDel() == false){return false;}' class="btn btn-sm btn-default" type="submit"><i class="fa fa-trash"></i></button>
						                                      			</form>
															        </td>
															    </tr>  
															    @endforeach
														</tbody>
						                          	</table>
												</div>
											</div>
										</div>
										<!-- /.box-body -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12 "> 
			<div class="small-box box">
	            <div class="inner">
		          <h1> {{ number_format($totalfinal, 2, '.', ',') }}</h1>
					
		              <p>{{$divisa->value}}</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-money"></i>
	            </div>
	            <label class="small-box-footer">
	              Balance Actual
	            </label>
	        </div>
		</div>
			

		<div class="col-md-4 col-sm-6 col-xs-12  pull-right ">
		  	<div class="info-box ">
			    <span class="info-box-icon"><i class="fa fa-credit-card-alt"></i></span>
			    <div class="info-box-content">
			      <span class="info-box-text">Balance de Impuestos</span>
			      <span class="info-box-number" style="color: darkgreen;" >+ {{ number_format($totalfinaliva, 2, '.', ',') }}</span>

				      	<div class="progress">
				        	<div class="progress-bar" style="width: 0%">
				        		
				        	</div>
				      	</div>
			          	<span class="progress-description" >No deducibles:
			          		<span style="color: red;"> {{ number_format($totalfinalivae, 2, '.', ',') }}</span>
			            	
			          	</span>
		    	</div>
			</div>
			<a  target="_blank" href="/pdf<?php echo $url."&tax"  ?>" class="btn btn-block btn-social btn-google">
                <i class="fa fa-file-pdf-o"></i> Reporte Detallado 
              </a>

              <a  target="_blank" href="/pdf<?php echo $url  ?>" class="btn btn-block btn-social btn-google">
                <i class="fa fa-file-pdf-o"></i> Reporte Sin tax
              </a>
		</div>
		<div class="col-md-4">
          <div class="box ">
            <div class="box-header with-border" style="background-color: deepskyblue;">
              <h3 class="box-title" >Total Abonos: {{ number_format($movimientosa->totale, 2, '.', ',') }} {{$divisa->value}}</h3>

              <div class="box-tools pull-right">
               
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body"  style="display: block; background-color: #dd4b39; color: #fff;">
              Total Retiros: {{ number_format($movimientosa->totals, 2, '.', ',') }} {{$divisa->value}}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

</div>

		
@endsection
