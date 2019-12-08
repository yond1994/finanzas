@extends('adminlte::layouts.app')

@section('main-content')

		<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-edit"></i><h3 class="box-title">Editar Categoria</h3>
               <button class="btn btn-primary pull-right" type="button" id="btn_add_attr">
                  <i class="fa fa-plus"></i>
                </button>
                 <button class="btn btn-primary pull-right" type="button" id="buttonremove">
                  <i class="fa fa-minus"></i>
                </button>
            </div>

          
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/categories/editar/{{$data->id}}" method="post">
            {{method_field('PUT')}}
             {{ csrf_field() }}
           
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre de la categoria</label>
                  <input required maxlength="200" type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Nombre de la categoria ">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Descripción</label>
                  <input required maxlength="200" name="description" type="text" value="{{$data->description}}"  class="form-control"  placeholder="descriptión">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tipo de Categoria</label>
                  <select name="type" class="form-control">
                  @if($data->type=='add')
                    <option value="add" selected>Categoria de entrada</option>
                    <option value="out">Categoria de Retiro</option>
                  @else
                    <option value="add" >Categoria de entrada</option>
                    <option value="out" selected>Categoria de Retiro</option>
                  @endif
                  </select>
                </div>
            
            @foreach ($data1 as $data1s)
             <div class="col-md-6">  
              <label for="exampleInputPassword1">Nombre  </label>
                   <div class="form-group">
          
                    <input type="hidden" value="{{$data1s->id}}" name="id[]">
                    <input required maxlength="200" name="name_[]" type="text" value=" {{$data1s->name}}"  class="form-control"  placeholder="Nombre de la subcategoria">
          
                  </div>
              </div>
               <div class="col-md-5">  
                <label for="exampleInputPassword1"> Valor </label>
                   <div class="form-group">
                    <input required maxlength="200" name="value_[]" type="text" value=" {{$data1s->value}}"  class="form-control"  placeholder="valores">
                  
                  
                  </div>
              </div>
               <div class="col-md-1">  
                      <label for="exampleInputPassword1"> &nbsp; </label>
                      <div class="form-group">
                        <a onclick='if(confirmDel() == false){return false;}' href="/categories/eliminarattr/{{$data1s->id}}"><i class="fa fa-trash"></i></a> 
                      </div>
                    </div>
              @endforeach
               <div class="box-body" id="list_attr">
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
              </div>
            </form>
        </div>
												

	

@endsection
