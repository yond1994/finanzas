@extends('adminlte::layouts.app')

@section('main-content')

		<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-edit"></i><h3 class="box-title">Editar Archivo</h3>
            </div>
              <div class="form-group" style="float: right;">
                  @if($data->crated_at!='null')
                      <label  >fecha de creación: <p>{{$data->created_at}}</p></label>
                      </br>
                  @endif
                </div>
                <div class="form-group">
                  @if($data->updated_at >0)
                      <label  >Ultima  edición: <p>{{$data->updated_at}}</p></label>
                      </br>
                  @endif
                </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/attached/editar/{{$data->id}}" method="post"  enctype="multipart/form-data">
            {{method_field('PUT')}}
             {{ csrf_field() }}
           
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Archivo adjunto</label>
                  <input required type="file" name="path" value="{{$data->path}}" class="form-control" placeholder="nombre del archivo ">
                </div>
              
               
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
              </div>
            </form>
        </div>
												

	

@endsection
