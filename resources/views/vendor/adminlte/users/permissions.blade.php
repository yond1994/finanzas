@extends('adminlte::layouts.app')
@section('main-content')

	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 ">
				<div class="box-body">
					<div class="container-fluid spark-screen">
						<div class="row">
							<div class="col-md-12">
								<div class="box box-admin-border">
									<div class="box-header with-border">
										<i class="fa fa-credit-card"></i><h3 class="box-title"><b>Lista de Usuarios</b></h3>
									</div>
									<div class="box-body responsive-table">
										<div id="lista_item_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div class="row">
												<div class="col-sm-12">
												
												 <form role="form" action ="/users/update/{{$iduser}}" method="get">
													<table  id="permisos" class="display" cellspacing="0" width="100%">
							                            <thead>
							                            <button   class="btn btn-sm btn-default pull-right " type="submit">Actualizar Permisos</button>
							                                <tr>							                          
																<th>Nombre</th>
																<th>Ver</th>
																<th>Agregar</th>
																<th>Editar</th>
																<th>Eliminar</th>
																
							                                </tr>
							                            </thead>
							                            <tbody>
							                            	@foreach($user as $usu )
							                           
		                                          				{{ csrf_field() }}
															    <tr>
															    	<td>Movimientos</td>
															
															    	@if($usu->movimientos > 0 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="mvver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="mvver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    	@if($usu->movimientos==1 || $usu->movimientos==2 || $usu->movimientos==3 || $usu->movimientos==6 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="mvagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="mvagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->movimientos==1 || $usu->movimientos==2 || $usu->movimientos==4 || $usu->movimientos==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="mveditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="mveditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->movimientos==1 || $usu->movimientos==5 || $usu->movimientos==6 || $usu->movimientos==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="mveliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="mveliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    </tr>
															 @endforeach 
															 @foreach($user as $usu )
							                           
		                                          				{{ csrf_field() }}
															    <tr>
															    	<td>Cuentas</td>
															
															    	@if($usu->cuentas > 0 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="cuver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="cuver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    	@if($usu->cuentas==1 || $usu->cuentas==2 || $usu->cuentas==3 || $usu->cuentas==6 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="cuagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="cuagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->cuentas==1 || $usu->cuentas==2 || $usu->cuentas==4 || $usu->cuentas==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="cueditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="cueditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->cuentas==1 || $usu->cuentas==5 || $usu->cuentas==6 || $usu->cuentas==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="cueliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="cueliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    </tr>
															 @endforeach 
															 @foreach($user as $usu )
							                           
		                                          				{{ csrf_field() }}
															    <tr>
															    	<td>Categorias</td>
															
															    	@if($usu->categoria > 0 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="caver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="caver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    	@if($usu->categoria  ==1 || $usu->categoria  ==2 || $usu->categoria  ==3 || $usu->categoria  ==6 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="caagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="caagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->categoria  ==1 || $usu->categoria  ==2 || $usu->categoria  ==4 || $usu->categoria  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="caeditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="caeditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->categoria  ==1 || $usu->categoria  ==5 || $usu->categoria  ==6 || $usu->categoria  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="caeliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="caeliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    </tr>
															 @endforeach 
															 @foreach($user as $usu )
		                                          				{{ csrf_field() }}
															    <tr>
															    	<td>Tours</td>
															
															    	@if($usu->tours > 0 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="tover" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="tover" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    	@if($usu->tours  ==1 || $usu->tours  ==2 || $usu->tours  ==3 || $usu->tours  ==6 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="toagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="toagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->tours  ==1 || $usu->tours  ==2 || $usu->tours  ==4 || $usu->tours  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="toeditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="toeditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->tours  ==1 || $usu->tours  ==5 || $usu->tours  ==6 || $usu->tours  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="toeliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="toeliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    </tr>
															 @endforeach 

															 @foreach($user as $usu )
		                                          				{{ csrf_field() }}
															    <tr>
															    	<td>Bitacora</td>
															
															    	@if($usu->bitacora > 0 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="biver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="biver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    	@if($usu->tours  ==1 || $usu->tours  ==2 || $usu->tours  ==3 || $usu->tours  ==6 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="biagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="biagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->tours  ==1 || $usu->tours  ==2 || $usu->tours  ==4 || $usu->tours  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="bieditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="bieditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->tours  ==1 || $usu->tours  ==5 || $usu->tours  ==6 || $usu->tours  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="bieliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="bieliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    </tr>
															 @endforeach 

															 @foreach($user as $usu )
		                                          				{{ csrf_field() }}
															    <tr>
															    	<td>Transferencia</td>
															
															    	@if($usu->transferencia > 0 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="traver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="traver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    	@if($usu->transferencia  ==1 || $usu->transferencia  ==2 || $usu->transferencia  ==3 || $usu->transferencia  ==6 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="traagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="traagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->transferencia  ==1 || $usu->transferencia  ==2 || $usu->transferencia  ==4 || $usu->transferencia  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="traeditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="traeditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->transferencia  ==1 || $usu->transferencia  ==5 || $usu->transferencia  ==6 || $usu->transferencia  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="traeliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="traeliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    </tr>
															 @endforeach 

															 @foreach($user as $usu )
		                                          				{{ csrf_field() }}
															    <tr>
															    	<td>Usuarios</td>
															
															    	@if($usu->usuario > 0 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="usver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="usuver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    	@if($usu->usuario  ==1 || $usu->usuario  ==2 || $usu->usuario  ==3 || $usu->usuario  ==6 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="usuagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="usuagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->usuario  ==1 || $usu->usuario  ==2 || $usu->usuario  ==4 || $usu->usuario  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="usueditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="usueditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->usuario  ==1 || $usu->usuario  ==5 || $usu->usuario  ==6 || $usu->usuario  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="usueliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="usueliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    </tr>
															 @endforeach 

															 @foreach($user as $usu )
		                                          				{{ csrf_field() }}
															    <tr>
															    	<td>Adjuntos</td>
															
															    	@if($usu->adjuntos> 0 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="adver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="adver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    	@if($usu->adjuntos  ==1 || $usu->adjuntos  ==2 || $usu->adjuntos  ==3 || $usu->adjuntos  ==6 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="adagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="adagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->adjuntos  ==1 || $usu->adjuntos  ==2 || $usu->adjuntos  ==4 || $usu->adjuntos  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="adeditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="adeditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->adjuntos  ==1 || $usu->adjuntos  ==5 || $usu->adjuntos  ==6 || $usu->adjuntos  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="adeliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="adeliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    </tr>
															 @endforeach 

															 @foreach($user as $usu )
		                                          				{{ csrf_field() }}
															    <tr>
															    	<td>Pdf</td>
															
															    	@if($usu->pdf> 0 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="pdfver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="pdfver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
																	<td><div class="checkbox">
													                    
												                  	</div></td>
															    	
															   
																	<td><div class="checkbox">
													                    
												                  	</div></td>
															    	
															
																	<td><div class="checkbox">
													                    
												                  	</div></td>
															    	
															    </tr>
															 @endforeach 

															 @foreach($user as $usu )
		                                          				{{ csrf_field() }}
															    <tr>
															    	<td>Movimientos Futuros</td>
															
															    	@if($usu->m_futuros> 0 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="fuver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="fuver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    	@if($usu->m_futuros  ==1 || $usu->m_futuros  ==2 || $usu->m_futuros  ==3 || $usu->m_futuros  ==6 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="fuagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="fuagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->m_futuros  ==1 || $usu->m_futuros  ==2 || $usu->m_futuros  ==4 || $usu->m_futuros  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="fueditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="fueditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->m_futuros  ==1 || $usu->m_futuros  ==5 || $usu->m_futuros  ==6 || $usu->m_futuros  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="fueliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="fueliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    </tr>
															 @endforeach 
															 @foreach($user as $usu )
		                                          				{{ csrf_field() }}
															    <tr>
															    	<td>Saldo</td>
															
															    	@if($usu->saldo> 0 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="salver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="salver" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    	@if($usu->saldo  ==1 || $usu->saldo  ==2 || $usu->saldo  ==3 || $usu->saldo  ==6 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="salagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="salagregar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->saldo  ==1 || $usu->saldo  ==2 || $usu->saldo  ==4 || $usu->saldo  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="saleditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="saleditar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	@if($usu->saldo  ==1 || $usu->saldo  ==5 || $usu->saldo  ==6 || $usu->saldo  ==7 )
																	<td><div class="checkbox">
													                    <label>
													                      <input checked name="saleliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@else
																	<td><div class="checkbox">
													                    <label>
													                      <input  name="saleliminar" type="checkbox">
													                    </label>
												                  	</div></td>
															    	@endif
															    	
															    </tr>
															 @endforeach 


														</tbody>


		                          					</table>

		                          				<button  style="margin-top: 10px;" class="btn btn-sm btn-default pull-right  " type="submit">Actualizar Permisos</button>
															    		
															    
		                          				</form>
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
