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
										<i class="fa fa-credit-card"></i><h3 class="box-title"><b>Montos Totales</b></h3>
										
									</div>
									
									<div class="box-body responsive-table">

										<div id="lista_item_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div class="row">
												<div class="col-sm-12">
													<table id="total" class="display" cellspacing="0" width="100%">
							                            <thead>
							                                <tr>								                                
																<th>ID</th>
																<th>Nombre de cuenta</th>
																<th>tipo de cuenta</th>
																<th>Numero</th>
																<th>Saldo</th>
																<th>Movimientos</th>
							                                </tr>
							                            </thead>
							                            <tbody>
															    @foreach ($summary as $summarys)
															    <tr>
															    	<td>{{ $summarys->id }}</td>
															    	<td>{{ $summarys->name }}</td>
															    	<td>{{ $summarys->type}}</td>
															    	<td>{{ $summarys->number }}</td>
															    	<td><n class="n">{{ number_format($summarys->total, 2, '.', ',') }}</n> {{$divisa->value}}
															    	 </td>
															    	 <td><center><a class="btn btn-sm btn-default"  href="/account/detalle/{{ $summarys->id }}"><i class="fa fa fa-eye"></i></a></center></td>
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
							              <h3>{{ number_format($totalfinal, 2, '.', ',') }}</h3>
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
							   @if($futuro!=null)
							    <div class="col-md-5">
						          <!-- Widget: user widget style 1 -->
						          <div class="box box-widget widget-user-2">
						       
						            <div class="widget-user-header bg-aqua">
						              <p><i class="fa fa-plus"></i> Abonos Futuros: {{ number_format($futuro->totale, 2, '.', ',') }} {{$divisa->value}}</p>
						              
						            </div>
						            <div class="widget-user-header bg-red">
						              <p> - Retiros Futuros: {{ number_format($futuro->totals, 2, '.', ',') }} {{$divisa->value}}</p>
						              <h5 class="widget-user-desc"></h5>
						            </div>
						            <div class="box-footer no-padding">
						              <ul class="nav nav-stacked">
						                <li><a href="#">Total Movimientos Futuros 
										@if($futuro->totalf>0)
											<span class="pull-right badge bg-blue"> {{ number_format($futuro->totalf, 2, '.', ',') }} {{$divisa->value}}</span></a></li>
										@else
											<span class="pull-right badge bg-red">{{ number_format($futuro->totalf, 2, '.', ',') }} {{$divisa->value}} </span></a></li>
										@endif
						                
						              </ul>
						            </div>
						          </div>
						          <!-- /.widget-user -->
						        </div>
						       @endif
									
 	@if($liquidez!=null)
		 <div class="col-md-4">
			<div class="box-footer no-padding">
			              <ul class="nav nav-stacked">
			              @if($liquidez->totalm1>0)
			 <li><a href="#">Liquides 1 Mes <span class="pull-right badge bg-aqua">{{ number_format($liquidez->totalm1, 2, '.', ',') }} {{$divisa->value}}</span></a></li>
			              @else
			<li><a href="#">Liquides 1 Mes <span class="pull-right badge bg-red">{{ number_format($liquidez->totalm1, 2, '.', ',') }} {{$divisa->value}}</span></a></li>
			              @endif
			              @if($liquidez->totalm3>0)
			<li><a href="#">Liquides 3 Meses <span class="pull-right badge bg-aqua">{{ number_format($liquidez->totalm3, 2, '.', ',') }} {{$divisa->value}}</span></a></li>
			              @else
			 <li><a href="#">Liquides 3 Meses <span class="pull-right badge bg-red">{{ number_format($liquidez->totalm3, 2, '.', ',') }} {{$divisa->value}}</span></a></li>             
			              @endif
			              @if($liquidez->totalm6>0)
			 <li><a href="#">Liquides 6 Meses <span class="pull-right badge bg-aqua">{{ number_format($liquidez->totalm6, 2, '.', ',') }} {{$divisa->value}}</span></a></li>
			              @else
			  <li><a href="#">Liquides 6 Meses <span class="pull-right badge bg-red">{{ number_format($liquidez->totalm6, 2, '.', ',') }} {{$divisa->value}}</span></a></li>             
			              @endif
			               
			              </ul>
			            </div>
			        </div>
	@endif
 
	</div>


@endsection
