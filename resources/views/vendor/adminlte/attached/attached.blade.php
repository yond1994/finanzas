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
                    <i class="fa fa-folder"></i><h3 class="box-title"><b>Documentos o arhivos adjuntos</b></h3>
                    
                    
                  </div>
                  
                  <div class="box-body responsive-table">

                    <div id="lista_item_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                      <div class="row">
                        <div class="col-sm-12">
                          <table id="attached" class="display" cellspacing="0" width="100%">
                              <thead>
                                 <tr>
                                  <th>ID</th>
                                  <th>Archivo</th>
                                  <th>Fecha de creación</th>
                                  <th>Ultima Edición </th>
                                  <th>Acción</th>
                                </tr>
                              </thead>
                              <tbody>
                                    @foreach ($attached as $attacheds)
                                    <tr>
                                      <td>{{ $attacheds->id }}</td>
                                      <td> <i class="fa fa-paperclip"></i></td>
                                      <td>{{ $attacheds->created_at }}</td>
                                      <td>{{ $attacheds->updated_at }}</td>
                                        <td>
                                       
                                        <form role="form" action = "/attached/eliminar/{{ $attacheds->id }}" method="post"  enctype="multipart/form-data">
                                                      {{method_field('DELETE')}}
                                                      {{ csrf_field() }}
                                                  <a class="btn btn-sm btn-default" href="/attached/edit/{{ $attacheds->id }}"><i class="fa fa-edit"></i></a>
                                                  <button onclick='if(confirmDel() == false){return false;}' class="btn btn-sm btn-default" type="submit"><i class="fa fa-trash"></i></button></a>
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
  </div>
  
@endsection
