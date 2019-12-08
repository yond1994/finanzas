<?php

if (isset($_GET['dias'])) {

    $dias = $_GET["dias"];
    $startf = "";

    if ($dias == 30) {
        $startf = date('Y-m-d', strtotime('today - 30 days'));
    }
    if ($dias == 15) {
        $startf = date('Y-m-d', strtotime('today - 15 days'));
    }
    if ($dias == 7) {
        $startf = date('Y-m-d', strtotime('today - 7 days'));
    }
    if ($dias == 1) {
        $startf = date('Y-m-d', strtotime('today'));
    }

    $finishf = date('Y-m-d', strtotime('today'));


} else {
    $finishf = '';
    $startf = '';
}


if ($startf == "") {

    if (isset($_GET['start'])) {
        $startf = $_GET["start"];
    } else {
        $startf = "";
    }

    if (isset($_GET['finish'])) {
        $finishf = $_GET["finish"];
    } else {
        $finishf = '';
    }
}

if (isset($_GET['dias'])) {
    $diasf = $_GET["dias"];
} else {
    $diasf = '';
}

if (isset($_GET["tipo"])) {
    $tipof = $_GET["tipo"];
} else {
    $tipof = "";
}
if (isset($_GET["cuentas"])) {
    $cuentasf = $_GET["cuentas"];
} else {
    $cuentasf = "";
}


if (isset($_GET["categoria"])) {
    $categoriaf = $_GET["categoria"];
} else {
    $categoriaf = "";
}

if (isset($_GET['id_attr'])) {
    $id_attrf = $_GET["id_attr"];
} else {
    $id_attrf = '';
}

if (isset($_GET['tf'])) {
    $id_tf = $_GET["tf"];
} else {
    $id_tf = '';
}
if (isset($_GET['id_attr_tours'])) {
    $id_attr_tours = $_GET["id_attr_tours"];
} else {
    $id_attr_tours = '';
}

?>
        <!DOCTYPE html>
<html lang="en">

<body>
<header class="clearfix">
    <div id="logo">
        <img src="https://www.heavydeveloper.me/front/images/site/mano.png">
    </div>
    <div class="div1">Reporte <span
                style="float: right; font-size: 22px">Balance: {{ number_format($totalfinal, 2, '.', ',') }} {{$divisa->value}}</span>
    </div>
    <div>
        <table>
            <thead>
            <tr>
                <?php
                echo "<th>Rango</th>";
                if ($tipof) {
                    echo "<th>Tipo</th>";
                }
                if ($cuentasf) {
                    echo "<th>Cuenta</th>";
                }

                if ($categoriaf) {
                    echo "<th>Categorias</th>";
                }

                if ($id_attrf) {
                    echo "<th>Sub-categoria</th>";
                }
                if ($id_tf) {
                    echo "<th>Tours</th>";
                }
                if ($id_attr_tours) {
                    echo "<th>Fecha de Salida</th>";
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <?php if ($startf == "" && $finishf == "") {
                        echo "Todos los registros";
                    } else {
                        echo $startf . " - " . $finishf;
                    }  ?>
                </td>
                <?php
                if($tipof){
                ?>
                <td><?php if ($tipof == 1) {
                        echo "Transferencia";
                    } elseif ($tipof == "add") {
                        echo "Abono";
                    } else {
                        echo "Retiro";
                    } ?></td>

                <?php }
                if($cuentasf){
                ?>
                <td>

                @foreach ($account as $accounts)
                    @if($accounts->id== $cuentasf)
                        {{ $accounts->name }}
                    @endif
                @endforeach
                <?php

                echo "</td>";
                }
                if($categoriaf){
                ?>
                <td>

                @foreach ($categories as $cate)
                    @if($cate->id== $categoriaf)
                        {{ $cate->name }}
                    @endif
                @endforeach
                <?php
                echo "</td>";
                }
                if($id_attrf){
                ?>
                <td>@foreach ($atributos as $a)
                        @if($a->id==  $id_attrf)
                            {{ $a->name }}
                        @endif
                    @endforeach
                </td>
                <?php  }
                if($id_tf){
                ?>
                <td>
                    @foreach ($tours as $tour)
                        @if($tour->id== $id_tf)
                            {{ $tour->name }}
                        @endif
                    @endforeach
                </td>
                <?php }
                if($id_attr_tours){ ?>
                <td>@foreach ($atributostours as $aa)
                        @if($aa->id==$id_attr_tours)
                            {{ $aa->date }}
                        @endif
                    @endforeach
                </td>
                <?php
                }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
</header>
<main>
    <table width="100%">
        <thead>
        <tr>
            <th class="service">
                #
            </th>
            <th class="desc">Fecha</th>
            <th>Tipo</th>
            <th>Motivo</th>
            <th>Cuenta</th>
            <th>Categoria</th>
            <th>Impuesto</th>
            <th>Monto</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($summary as $summarys)
            <tr>
                <td>{{ $summarys->id }}</td>
                @if( $summarys->created_at )
                    <?php  $datef = date_create($summarys->created_at);
                    $fecha = date_format($datef, 'd-m-Y ');
                    ?>
                @endif
                <td>{{ $fecha }}</td>
                @if($summarys->type=="add")
                    <td class="unit">Abono
                        <small class="label pull-right bg-primary">
                            @if($summarys->id_transfer!="")
                                <i class="fa fa-exchange"></i>
                            @else
                                <i class="fa fa-sort-up"></i>
                            @endif
                        </small>
                    </td>
                @elseif($summarys->type=="out")
                    <td class="qty">Retiro
                        <small class="label pull-right bg-red">
                            @if($summarys->id_transfer!="")
                                <i class="fa fa-exchange"></i>
                            @else
                                <i class="fa fa-sort-desc"></i>
                            @endif
                        </small>
                    </td>
                @endif
                <td>{{ $summarys->concept }}</td>
                <td class="total">{{ $summarys->name_account }}</td>
                <td>{{ $summarys->name_categories }}</td>
                <td>{{ number_format( $summarys->tax, 2, '.', ',') }}</td>
                <td>{{ number_format($summarys->amount, 2, '.', ',') }} {{$divisa->value}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <table>
        <tr>
            <td class="grand total"></td>
            <td class="grand total"></td>
            <td class="grand total"></td>
            <td class="grand total"></td>
            <td class="grand total"></td>
            <td class="grand total"></td>
            <td class="grand total"></td>
            <td class="grand total"></td>
            <td class="grand total"></td>
            <td class="grand total"></td>
        </tr>
        <tr>
            <td colspan="9" class="grand total"></td>
            <td colspan="" class="grand total">Balance
                : {{ number_format($totalfinal, 2, '.', ',') }} {{$divisa->value}}</td>
        </tr>
    </table>
    <?php
    if(isset($_GET['tax'])) {
    ?>
    <table style="width: 30%; float: right;  ">
        <tr>
            <td colspan="2">
                Impuestos
            </td>
        </tr>
        <tr>
            <td>A Favor:</td>
            <td> + {{ number_format($totalfinaliva, 2, '.', ',') }} {{$divisa->value}} </td>
        </tr>
        <tr>
            <td>Por Pagar:</td>
            <td> {{ number_format($totalfinalivae, 2, '.', ',') }}  {{$divisa->value}} </td>
        </tr>
    </table>
    <?php
    }
    ?>
</main>
<footer>
    <div>
        <div><span>Fecha: </span> {{$hoy2}}</div>
    </div>
</footer>
</body>
</html>
<style type="text/css">
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #5D6975;
        text-decoration: underline;
    }

    body {
        position: relative;
        width: 19cm;
        height: 29.7cm;
        margin: 0 auto;
        color: #001028;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 12px;
        font-family: Arial;
    }

    header {
        padding: 10px 0;
        margin-bottom: 30px;
    }

    #logo {
        text-align: center;
        margin-bottom: 10px;
    }

    #logo img {
        width: 90px;
    }

    .div1 {
        border-top: 1px solid #5D6975;
        border-bottom: 1px solid #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;

        margin: 0 0 20px 0;
    }

    #project {
        float: left;
    }

    #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
    }

    #company {
        float: right;
        text-align: right;
    }

    #project div,
    #company div {
        white-space: nowrap;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }

    table tr:nth-child(2n-1) td {
        background: #F5F5F5;
    }

    table th,
    table td {
        text-align: center;
    }

    table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;
        font-weight: normal;
    }

    table .service,
    table .desc {
        text-align: left;
    }

    table td {
        padding: 10px;
        text-align: center;
    }

    table td.service,
    table td.desc {
        vertical-align: top;
    }

    table td.unit,
    table td.qty,
    table td.total {
        font-size: 1.2em;
    }

    table td.grand {
        border-top: 1px solid #5D6975;;
    }

    #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
    }

    footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
    }
</style>