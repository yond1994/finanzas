@extends('adminlte::layouts.app')

@section('main-content')
	

    	<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">

          <h2 class="page-header">
            <i class="fa fa-bar-chart"></i> Detalle Del Movimiento

            <small class="pull-right">Fecha de creación:   @if($data->crated_at!='null')
                      {{$data->created_at}}
                      
                  @endif</small>  
            <small  class="pull-right margen30">Autor:  
                    @if($user==null)
                      Sin Autor
                    @else
                        {{$user->name}}
                    @endif

            </small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Motivo
          <address>
            <strong><label>{{$data->concept}}</label></strong><br>
           
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Tipo de movmiento
          <address>
            <strong><label>
			@if($data->type=='add')
			Ingreso
			@else
			Retiro
			@endif
            </label></strong>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Cuenta</b><br>
           <address>
            <strong><label>{{$data->name_a->name}}</label></strong><br>
           
          </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>id</th>
              <th>N° Ref</th>
              <th>Categoria</th>
              <th>Atributo</th>
              <th>Impuesto</th>
              <th>Monto</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->factura}}</td>
              <td>{{$data->name_c->name}}</td>
              @if($data->name_atr)
              <td>{{$data->name_atr->name}}</td>
              @else
               <td>No aplica</td>
              @endif
              <td>{{$data->tax}}</td>
              <td>{{ number_format($data->amount, 2, '.', ',') }}</td>
            </tr>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
         @if($data->attached)
          <p class="lead">Adjuntos:</p>
         <!--aqui va la url de a variable-->

        
         <a href="/download/{{$data->attached->id}}" target="_blank" class="">
         	<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Descargar Adjunto.
         	<i class="fa fa-paperclip pull-right"></i>
          </p></a>
         @endif

          
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
     
    </section>
												

	

@endsection
