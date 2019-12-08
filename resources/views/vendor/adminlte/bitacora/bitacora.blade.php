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
										<i class="fa fa-bar-chart"></i><h3 class="box-title"><b>Bitacora</b></h3>

									   
									 
									</div>
									
								<form action="/bitacora/bitacora" method = "get">
										<div class="col-sm-12 add_top_10">
										
											<div class="form-group col-sm-6">
												<input type="date" name="start"  class="form-control">
											</div>
											<div class="form-group col-sm-6">
												<input type="date" name="finish"  class="form-control">
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
											
											
											
											<div class="col-sm-3 add_top_1">
														<select class="form-control"  type="text" name="tipo" >
															<option value="">Tipo de movimiento</option>
															<option value="add">Ingresos</option>
															<option value="out">Retiros</option>
															<option value="update">Editados</option>
															<option value="delete">Eliminados</option>									
														</select>
											</div>
											<div class="col-sm-3 add_top_1">
														<select class="form-control"  type="text" name="usuarios" >
															<option value="">Usuarios</option>
															@foreach ($user as $users)
															<option value="{{ $users->id }}">{{ $users->name }}</option>
															@endforeach
														</select>
											</div>
											<div class="col-sm-3 add_top_1">
														<select class="form-control"  type="text" name="actividad" >
															<option value="" >Activida</option>
															<option value="cuentas">Cuentas</option>
															<option value="movimiento">Movimientos</option>
															<option value="categorias">Categorias</option>
															<option value="Documento">Documentos</option>
															<option value="transferencia">Transferencia</option>
															<option value="usuario">Usuario</option>
														</select>
												
											</div>
											<div class="col-sm-1 add_top_1  ">
															 <button type="submit" class="btn btn-sm  btn-default form-control "><i class="fa fa-filter"></i></button>
											</div>	
								
									</div>
								</form>

									
									<div class="box-body responsive-table  ">

										<div id="lista_item_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div class="row ">
												<div class="col-sm-12 " >
													
													<table id="bitacora" class="display" cellspacing="0" width="100%">
						                                <thead>
						                                   	<tr>
																<th>ID</th>
																<th>Fecha </th>
																<th>tipo</th>
																<th>Actividad</th>
																<th>Usuario</th>
																
																
															</tr>
						                                </thead>
						                                <tbody>
															    @foreach ($bitacora as $bitacoras)
															    <tr>
															    	<td>{{ $bitacoras->id }}</td>
															    	@if( $bitacoras->created_date )
															    	<?php  $datef= date_create($bitacoras->created_date); 
																	 $fecha=date_format($datef, 'd-m-Y ');
															    	?>
																	@endif
															    	<td>{{ $fecha }}</td> 
															    	@if($bitacoras->type=="add")
															    	<td><small class="label  bg-primary"><i class="fa fa-sort-up"></i></small> Agrego</td>
															    	@elseif($bitacoras->type=="out")
															    	<td><small class="label  bg-red"><i class="fa fa-sort-desc"></i></small> Retiro </td>
															    	@elseif($bitacoras->type=="update")
															    	<td><small class="label alert-warning"><i class="fa fa-edit"></i></small> Editado </td>
															    	@else
															       <td><small class="label  bg-red"><i class="fa fa-trash"></i></small> ELiminado</td>
															       	@endif
															   		<td>{{ $bitacoras->activity }}</td>
															        <td>
																 		{{ $bitacoras->name_user }}
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
