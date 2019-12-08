<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">

            
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
            <li><a href="{{ url('montos/montos') }}"><i class='fa fa-credit-card'></i> <span>Saldo</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-bar-chart'></i> <span>Movimientos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('summary/create') }}">Nuevo Movimiento</a></li>
                    <li><a href="{{ url('summary/summary') }}">Lista de Movimientos</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-code-fork'></i> <span>Categorias</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('categories/create') }}">Crear Categoria</a></li>
                    <li><a href="{{ url('categories/categories') }}">Lista de categorias</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a  href="#"><i class='fa fa-balance-scale'></i> <span>Balance</span>  <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('balance/balance/add') }}">Ingresos</a></li>
                    <li><a href="{{ url('balance/balance/out') }}">Egresos</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-bank'></i> <span>Cuentas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('account/create') }}">Crear Cuenta</a></li>
                    <li><a href="{{ url('account/account') }}">Lista de cuentas</a></li>
                </ul>
            </li>
            <li><a href="{{ url('users/users') }}"><i class='fa fa-user'></i> <span>Usuarios</span></a></li>
            <li><a href="{{ url('transfer/create') }}"><i class='fa fa-money'></i> <span>Transferencia</span></a>
            <li><a href="{{ url('tours/tours') }}"><i class='fa fa-globe'></i> <span>Productos</span></a></li>
            {{--<li class="treeview">--}}
                {{--<a href="#"><i class='fa fa-list-ol'></i> <span> Lista de  Productos</span> <i class="fa fa-angle-left pull-right"></i></a>--}}
                {{--<ul id="toursresult" class="treeview-menu">--}}
               {{----}}
                {{--</ul>--}}
            {{--</li>--}}
            <li><a href="{{ url('futuro/futuro') }}"><i class='fa fa-fast-forward'></i> <span>Movimientos Futuros</span></a>
            <li><a href="{{ url('bitacora/bitacora') }}"><i class='fa fa-history'></i> <span>Bitacora</span></a>
            </li>
            
          <!--   <li> <a href="{{ url('attached/attached') }}"><i class='fa fa-paperclip'></i> <span>Adjuntos</span></a></li> -->
    
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
    