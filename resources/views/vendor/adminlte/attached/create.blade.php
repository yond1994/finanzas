@extends('adminlte::layouts.app')
@section('main-content')

		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar adjunto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/attached/save" method = "post" enctype="multipart/form-data">
            {{ csrf_field() }}	
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre del archivo</label>
                  <input type="file" required name="path"  class="form-control" placeholder="Nombre del archivo">
                  <input type="hidden" name="summary_id" value="{{$data->id}}">
                </div>
                <!-- <div class="form-group">
                  <label for="exampleInputPassword1">fecha de creacion</label>
                  <input name="created_at" type="date"   class="form-control"  placeholder="fecha de creacion">
                </div> -->
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
        </div>
@endsection
