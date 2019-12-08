@extends('adminlte::layouts.app')
@inject('provider', 'App\Http\Controllers\balanceController')
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
                                        <i class="fa fa-code-fork"></i><h3 class="box-title"><b>Balance global Categorias</b></h3>

                                        {{--<a class="btn btn-primary " style="float: right;" href="/categories/create"> <i class="fa fa-plus"></i>Nuevo</a>--}}
                                    </div>
                                    <form action="/balance/balance" method = "get">
                                        <div class="col-sm-12 add_top_10">
                                            <div class="col-sm-8 " style="border-right: solid 1px #8d8d8d">
                                                <h5>Filtrar por subcategorias</h5>
                                                <div class="form-group col-sm-3">
                                                    <select class="form-control"  type="text" name="categoria" >
                                                        <option value="">Categorias</option>
                                                        @foreach ($categories as $datas)
                                                            <option value="{{ $datas->id }}">{{ $datas->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <input type="date" name="start"   placeholder="Fecha Inicio" class="form-control">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <input type="date" name="finish" placeholder="Fecha Final"  class="form-control">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <select class="form-control"  type="text" name="tipo" >
                                                        <option selected value="out">Retiros</option>
                                                        <option value="add">Ingresos</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 ">
                                                <h5>Categorias Anuales</h5>
                                                <div class="form-group col-sm-6">
                                                    <select class="form-control"  type="text" name="year" >
                                                        <option value="2019">2020</option>
                                                        <option selected value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 add_top_1  ">
                                                    <button type="submit" class="btn btn-sm  btn-default form-control "><i class="fa fa-filter"></i></button>
                                                </div>
                                            </div>


                                </div>

                        {{--<div class="col-sm-12 add_top_1">--}}

                                            {{--<div class="col-sm-2 add_top_1  ">--}}
                                                {{--<select class="form-control"  type="text" name="dias" >--}}
                                                    {{--<option value="">Filtrar Por dias</option>--}}
                                                    {{--<option value="30">Ultimo mes</option>--}}
                                                    {{--<option value="15">Ultimos 15 dias</option>--}}
                                                    {{--<option value="7">Ultimos 7 dias</option>--}}
                                                    {{--<option value="1">Hoy</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-sm-2 add_top_1">--}}
                                                {{--<select class="form-control"  type="text" name="tipo" >--}}
                                                    {{--<option value="add">Abonos</option>--}}
                                                    {{--<option value="out">Retiros</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}

                                            {{--<div class="col-sm-2 add_top_1">--}}
                                                {{--<select class="form-control"  type="text" name="cuentas" >--}}
                                                    {{--<option value="">Categorias</option>--}}
                                                    {{--@foreach ($categories as $datas)--}}
                                                        {{--<option value="{{ $datas->id }}">{{ $datas->name }}</option>--}}
                                                    {{--@endforeach--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                            {{----}}
                                            {{--<div class="col-sm-2 add_top_1  ">--}}
                                                {{--<button type="submit" class="btn btn-sm  btn-default form-control "><i class="fa fa-filter"></i></button>--}}
                                            {{--</div>--}}

                                            {{--<!-- <div   class=" col-sm-12">--}}
                                                           {{--<div   class="hidden" id="res_ajax">--}}

                                                           {{--</div>--}}
                                            {{--</div> -->--}}
                                        {{--</div>--}}
                                    </form>

                                    <div class="box-body responsive-table">

                                        <div id="lista_item_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <?php
                                                        if(count($timeline)>=12){
                                                            $valorletra = '10px';
                                                        } else {
                                                            $valorletra = '12px';
                                                        }
                                                    ?>
                                                    <table style="font-size: <?php echo  $valorletra ?>" id="balance" class="display" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                @if($tipom=="add")
                                                                        <small class="label pull-left bg-primary">
                                                                                <i class="fa fa-sort-up"></i>
                                                                        </small>
                                                                @elseif($tipom=="out")
                                                                        <small class="label pull-left bg-red">
                                                                                <i class="fa fa-sort-desc"></i>
                                                                        </small>
                                                                    @endif
                                                                    @if($cateselet)
                                                                       &nbsp; {{$cateselet->name}}
                                                                        @else
                                                                        &nbsp; Categorias
                                                                    @endif
                                                                </th>
                                                                @foreach ($timeline as $t=> $valor)
                                                                    <th>{{$t}}</th>
                                                                @endforeach
                                                                <th style="background-color: #c6e0ec;">Total</th>
                                                            </tr>
                                                        </thead>
                                                            <tbody>
                                                                @foreach ($subcategorias as $ss)
                                                                    <tr>
                                                                        <td>
                                                                            {{$ss->name}}
                                                                        </td>

                                                                        {{--solo si tiene categoria--}}
                                                                        @if( $filter )
                                                                            @foreach ($timeline as $t=> $valor)
                                                                                @if( $valor )
                                                                                    <td>
                                                                                        <?php $sum = 0; ?>
                                                                                        @foreach ($valor as  $datos)
                                                                                            @if($datos->amount)
                                                                                                @if($datos->id_attr ==  $ss->id)
                                                                                                 <?php $sum += $datos->amount;
                                                                                                 ?>
                                                                                                @endif
                                                                                            @endif
                                                                                        @endforeach
                                                                                        <?php echo number_format($sum, 2, '.', ',');?>
                                                                                    </td>
                                                                                @else
                                                                                    <td>
                                                                                       0
                                                                                    </td>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif

                                                                        @if(!$filter )
                                                                            @foreach ($timeline as $t=> $valor)
                                                                                @if( $valor )
                                                                                    <td>
                                                                                        <?php $sum = 0; ?>
                                                                                        @foreach ($valor as  $datos)

                                                                                            @if($datos->amount)
                                                                                                    {{--{{$datos->amount}}--}}
                                                                                                    {{--{{$datos->categories_id}}--}}
                                                                                                @if($datos->categories_id ==  $ss->id)
                                                                                                    <?php $sum += $datos->amount;
                                                                                                    ?>
                                                                                                @endif
                                                                                            @endif
                                                                                        @endforeach
                                                                                        <?php echo number_format($sum, 2, '.', ',');?>
                                                                                    </td>
                                                                                @else
                                                                                    <td>
                                                                                        0
                                                                                    </td>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif




                                                                            <td style="background-color: #c6e0ec; color: #111;">
                                                                                @if($filter )
                                                                                    <?php $sum = 0; ?>
                                                                                    @foreach ($timeline as $t=> $valor)
                                                                                        @if( $valor )
                                                                                            @foreach ($valor as  $datos)
                                                                                                @if($datos->amount)
                                                                                                    @if($datos->id_attr ==  $ss->id)
                                                                                                        <?php $sum += $datos->amount;
                                                                                                        ?>
                                                                                                    @endif
                                                                                                @endif

                                                                                            @endforeach
                                                                                        @endif
                                                                                    @endforeach
                                                                                    <?php echo number_format($sum, 2, '.', ',');?>
                                                                                @endif



                                                                                @if(!$filter )
                                                                                <?php $sum = 0; ?>
                                                                                @foreach ($timeline as $t=> $valor)
                                                                                    @if( $valor )

                                                                                        @foreach ($valor as  $datos)

                                                                                                @if($datos->categories_id ==  $ss->id)
                                                                                                    <?php $sum += $datos->amount;
                                                                                                    ?>
                                                                                                @endif
                                                                                        @endforeach
                                                                                    @endif
                                                                                @endforeach
                                                                                 <?php echo number_format($sum, 2, '.', ',');?>
                                                                                @endif
                                                                                {{--@foreach ($timeline as  $valor)--}}
                                                                                    {{--{{$valor->id}}--}}
                                                                                {{--@endforeach--}}
                                                                            </td>
                                                                    </tr>

                                                                @endforeach
                                                                @if($timeline)
                                                                <tr style="background-color: #c6e0ec; color: #111">
                                                                    <td style="background-color: #a2c5d5;"></td>
                                                                    <?php $totall = 0; ?>
                                                                     @foreach ($timeline as $t=> $valor)
                                                                        @if( $valor )
                                                                            <td>
                                                                                <?php $sum = 0; ?>
                                                                                @foreach ($valor as  $datos)
                                                                                    @if($datos->amount)
                                                                                        @if($datos->numberOf ==  $t)
                                                                                            <?php
                                                                                                $sum += $datos->amount;
                                                                                                $totall += $datos->amount;
                                                                                            ?>
                                                                                        @endif
                                                                                    @endif
                                                                                @endforeach
                                                                                <?php echo number_format($sum, 2, '.', ',') ;?>
                                                                            </td>
                                                                        @else
                                                                            <td>
                                                                               0
                                                                            </td>
                                                                        @endif
                                                                    @endforeach
                                                                    <td>  <?php echo  number_format($totall, 2, '.', ',')  ?></td>
                                                                </tr>
                                                                @endif
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
