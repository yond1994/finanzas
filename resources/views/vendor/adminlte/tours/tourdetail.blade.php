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
									<div class="box-header with-border">
										<i class="fa fa-bar-chart"></i><h3 class="box-title"><b>Fechas de Salidas del tour: {{$tour->name}}</b></h3>
									</div>
									
									<div class="box-body responsive-table  ">

										<div id="lista_item_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div class="row ">
												<div class="col-sm-12 " >
													

												
													<table  id="summary" class="display" cellspacing="0" width="100%">
						                                <thead>
						                                   	<tr>
																<th>ID</th>
																<th>Fecha De Salida </th>
																<th>Precio</th>
																<th>Total Abonos</th>
																<th>Total Retiros</th>
																<th>Balance Actual</th>
																<th>Opción</th>
															</tr>
						                                </thead>
						                                <tbody>
															    @foreach($data as $tur)
															    <tr>
															   		<td>{{$tur->id}}</td>
															   		@if( $tur->date )
															    	<?php  $datef= date_create($tur->date); 
																	 $fecha=date_format($datef, "F j, Y");
															    	?>
																	@endif	
															    	<td>{{$fecha}}</td>
															    	<td>{{ number_format( $tur->price, 2, '.', ',') }} {{$divisa->value}}</td>
															    	
															    	<td>{{number_format($tur->totale, 2, '.', ',')}} {{$divisa->value}}</td>
															    	<td>{{number_format($tur->totals, 2, '.', ',') }} {{$divisa->value}}</td>
															        <td>{{number_format($tur->totalf, 2, '.', ',') }} {{$divisa->value}}
															        </td>
															        <td>
															        	 <a class="btn btn-sm btn-default" href="/tours/fecha/{{ $tur->id }}"><i class="fa fa-eye"></i></a>
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

</div>

		
@endsection
