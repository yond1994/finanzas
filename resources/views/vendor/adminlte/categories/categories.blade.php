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
                     <i class="fa fa-code-fork"></i><h3 class="box-title"><b>Categorias</b></h3>
                    
                    <a class="btn btn-primary " style="float: right;" href="/categories/create"> <i class="fa fa-plus"></i>Nuevo</a>
                  </div>
                  
                  <div class="box-body responsive-table">

                    <div id="lista_item_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                      <div class="row">
                        <div class="col-sm-12">
                          <table id="categories" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nombre</th>
                                      <th>Descripción</th>
                                      <th>Tipo</th>
                                      <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($categories as $categoriess)
                                  <tr>
                                    <td>{{ $categoriess->id }}</td>
                                    <td>{{ $categoriess->name }}</td>
                                    <td>{{ $categoriess->description }}</td>
                                    @if($categoriess->type=='add' )
                                        <td>Categoria de Ingreso</td>
                                    @else
                                        <td>Categoria de Retiro</td>
                                    @endif
                                   
                                  
                                      <td>
                                     
                                    
                                    
                                    @if($categoriess->id !==1 )
                                      <form role="form" action = "/categories/eliminar/{{ $categoriess->id }}" method="post"  enctype="multipart/form-data">
                                            {{method_field('DELETE')}}
                                            {{ csrf_field() }}
                                        <a class="btn btn-sm btn-default" href="/categories/edit/{{ $categoriess->id }}"><i class="fa fa-edit"></i></a>
                                        <button onclick='if(confirmDel() == false){return false;}' class="btn btn-sm btn-default" type="submit"><i class="fa fa-trash"></i></button></a>
                                      </form>
                                    @endif

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
