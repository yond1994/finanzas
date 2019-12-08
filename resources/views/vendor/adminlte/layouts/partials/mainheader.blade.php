<!-- Main Header -->
<header class="main-header" >

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo" style="background-color: #011123!important">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img width="60%" src="/img/logomini.png"> </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><img width="60%" src="/img/logo.png"> </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation" style="background-color: #011123!important">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
               
        <li>
            <a href="https://www.heavydeveloper.me/" target="_blank" class="dropdown-toggle">
               <img style="float: right;" width="40px" src="/img/espana.png">
            
            </a>    
        </li>
                <!-- Notifications Menu -->
                
                <!-- Tasks Menu -->
               
                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu" id="user_menu">
                        <!-- Menu Toggle Button -->
                        

                         <div style="    text-align: center;">
                                    <a href="{{ url('/logout') }}" style="width: 100%" id="logout"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                       <i  class="fa fa-sign-out fa-2x botonsalir "></i> 
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="submit" value="logout" style="display: none;">
                                    </form>

                                </div>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button -->
               <!--  <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>




</header>
