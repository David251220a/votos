<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- APIToken -->    
    
    <title>ANR | www.anr.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    @livewireStyles

    <link rel="stylesheet" href="{{asset('css/form-step.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
          folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    @yield('estilos')
  </head>
  <body class="hold-transition skin-red sidebar-mini">

    <div class="wrapper">
      
      <header class="main-header ">
        <!-- Logo -->
        <a href="{{route('home')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>ANR</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ANR</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if (Auth::user())
                  
                    <small class="bg-red">Online</small>
                    <span class="hidden-xs">{{ Auth::user()->name}}</span>

                  @endif
                  
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    @if (Auth::user())
                      <p>
                        {{ Auth::user()->name }}
                        <small>Sistema Desarrollado</small>
                      </p>    
                    @endif
                    
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                    <a href="{{url ('/logout')}}" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
          
        
      </header>
      <!-- Left side column. contains the logo and sidebar -->      
      @if (Auth::user())

        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- sidebar menu: : style can be found in sidebar.less -->          
            <ul class="sidebar-menu">
              <li class="header"></li>
              
              <li id="votacion" name="votacion" class="treeview">
                <a href="#">
                  <i class="fa fa-user-o"></i>
                  <span>Votacion</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('intendente.index')}}"><i class="fa fa-circle-o"></i> Intendente</a></li>
                  <li><a href="{{route('consejal.index')}}"><i class="fa fa-circle-o"></i> Consejal</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="{{route('padron.index')}}">
                  <i class="fa fa-user-circle"></i> <span>Padron</span>
                </a>
              </li>

              <li id="consulta" name="consulta" class="treeview">
                <a href="#">
                  <i class="fa fa-inbox"></i>
                  <span>Consulta</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('consulta.votos') }}"><i class="fa fa-circle-o"></i>Votos General</a></li>
                  <li><a href="{{ route('consulta.local') }}"><i class="fa fa-circle-o"></i>Votos Locales</a></li>
                  <li><a href="{{ route('consulta.lista') }}"><i class="fa fa-circle-o"></i>Votos Lista</a></li>
                  <li><a href="{{ route('consulta.referente') }}"><i class="fa fa-circle-o"></i>Referentes</a></li>
                </ul>
              </li>                                     

              {{-- <li class="treeview">
                <a href="#">
                  <i class="fa fa-folder"></i> <span>Acceso</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li id="#"><a href="{{url('acceso/usuario')}}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                  <li id="#"><a href="{{url('acceso/reset')}}"><i class="fa fa-refresh"></i> Cambio de Contraseña</a></li>                  
                </ul>
              </li> --}}

              {{-- <li id="reset" name="reset" class="treeview">
                <a href="{{url('acceso/reset')}}">
                  <i class="fa fa-refresh"></i> <span>Cambio Contraseña</span>                
                </a>
              </li> --}}
                          
            </ul>
          </section>
          <!-- /.sidebar -->
        </aside>    
      
      @endif

      <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema ANR</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
                              <!--Contenido-->
                                @yield('contenido')
                                @if (Auth::user())
                                  <input type="hidden" id="prol" name="prol"  value="{{Auth::user()->id_rol}}" class="form-control">    
                                  <input type="hidden" id="id_user" name="id_user"  value="{{Auth::user()->id}}" class="form-control">
                                @endif
                                <input type="hidden" id="prol" name="prol"  value="0" class="form-control">    
                                <input type="hidden" id="id_user" name="id_user"  value="0" class="form-control">
                                
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.1.0
        </div>
        <strong>Copyright &copy; 2024 <a href="#">ANR</a>.</strong> All rights reserved.
      </footer>

      
    <!-- jQuery 2.1.4 -->
      @livewireScripts
      <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
      <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
      <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>      
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <script src="{{asset('js/bootstrap-select.min.js')}}"></script>      
      <script src="{{asset('js/app.min.js')}}"></script>
      @yield('scripts')
    
  </body>

</html>
