@extends('adminlte::layouts.app')
@section('main-content')

<div class="col-md-6">
  <div class="box box-danger">
    <div class="box-header with-border ">
    <center>
      <h3 class="box-title">Se ha producido un error</h3>
    </center>
    </div>
    <!-- /.box-header -->
      <div class="box-body">
        <center>
        <p>El tour que intentas eliminar esta en uso</p>
        </center>
        </br>
        <center>
        <a  href="/tours/tours"><button><i class="fa fa-arrow-left"></i> Regresar </button>
        </center>
      </div>
  </div>
</div>
@endsection