@extends('adminlte::layouts.app')



@section('main-content')

	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 ">
				<div class="box-body ">
					<div class="container-fluid spark-screen">
						<div class="row">
							<div class="col-md-12">
								<div class="box box-admin-border">
									<div class="box-header with-border">
										<i class="fa fa-bar-chart"></i><h3 class="box-title"><b>Movimientos de:  {{$nombre->name}}</b></h3>

									 
									 
									</div>
									<div class="col-sm-12 add_top_10">
										<form action="/account/detalle/{{$id}}" method = "get">
										
											<div class="form-group col-sm-5">
												<input type="date" name="start" placeholder="Fecha Inicio" class="form-control">
											</div>
											<div class="form-group col-sm-5">
												<input type="date" name="finish" placeholder="Fecha Final"  class="form-control">
											</div>
											<div class="form-group col-sm-2 text-right">
												 <button type="submit" class="btn btn-sm  btn-default form-control"><i class="fa fa-filter"></i>Filtrar</button>
											</div>
										</form>
										
									</div>
									
									<div class="box-body responsive-table ">

										<div id="lista_item_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div class="row">
												<div class="col-sm-12">
													
													<table id="summary" class="display" cellspacing="0" width="100%">
						                                <thead>
						                                   	<tr>
																<th>ID</th>
																<th>Fecha de creación</th>
																<th>Tipo</th>
																<th>Monto</th>
																<th>Impuesto</th>
																<th>Motivo</th>
																
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
															    	<!-- <td>{{ $summarys->created_at }}</td> -->
															    	@if($summarys->type=="add")
															    	<td>Abono <small class="label pull-right bg-primary"><i class="fa fa-sort-up"></i></small></td>
															    	@else
															    	<td>Retiro <small class="label pull-right bg-red"><i class="fa fa-sort-desc"></i></small></td>
															    	@endif
															        <td>{{ number_format($summarys->amount, 2, '.', ',') }} {{$divisa->value}}</td>
															        <td>{{ number_format($summarys->tax, 2, '.', ',') }} </td>
															        <td>{{ $summarys->concept }}</td>
															       
															        <td>{{ $summarys->name_categories }}</td>
															        <td>
																 		<form role="form" action = "/summary/eliminar/{{ $summarys->id }}" method="post"  enctype="multipart/form-data">
							                                          			{{method_field('DELETE')}}
							                                          			{{ csrf_field() }}
							                                          		<a class="btn btn-sm btn-default"  href="/detalle/detalle/{{ $summarys->id }}"><i class="fa fa fa-eye"></i></a> 
																			@if($summarys->attached)
							                                          		 <a class="btn btn-sm btn-default" target="_blank" href="/download/{{$summarys->attached->id}}"><i class="fa fa-paperclip"></i></a>
																			@endif

							                                       			
							                                      			<a class="btn btn-sm btn-default" href="/summary/edit/{{ $summarys->id }}"><i class="fa fa-edit"></i></a>
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
							              <h3>{{ number_format($totalf, 2, '.', ',') }}</h3>

							              <p>{{$divisa->value}}</p>
							            </div>
							            <div class="icon">
							              <i class="fa fa-money"></i>
							            </div>
							            <label class="small-box-footer">
							              Saldo Total 
							            </label>
							          </div>
							    </div>
	</div>
@endsection
