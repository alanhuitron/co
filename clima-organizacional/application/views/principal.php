
<!DOCTYPE html>
<html ng-app="angularRoutingApp"  >
  <head>
    <meta charset="UTF-8">
    <title>::SUNAT-Clima Organizacional</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url();?>librerias/plantilla/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url();?>librerias/plantilla/plugins/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
 
    <!-- Ionicons -->
     
    <link href="<?php echo base_url();?>librerias/plantilla/plugins/ionicons-2.0.1/css/ionicons.css" rel="stylesheet" type="text/css" />
 
    <!-- jvectormap -->
    <link href="<?php echo base_url();?>librerias/plantilla/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" /> 
    <!-- Theme style -->
    <link href="<?php echo base_url();?>librerias/plantilla/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>librerias/script/blockui-angular/angular-block-ui.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>librerias/script/datatable/jquery.dataTables.css"  rel="stylesheet" type="text/css">
    
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <script src="<?php echo base_url();?>librerias/plantilla/plugins/jQuery/jquery.js"></script>
    <script src="<?php echo base_url();?>librerias/script/datatable/jquery.dataTables.min.js"></script>
    <link href="<?php echo base_url();?>librerias/plantilla/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url();?>librerias/script/angular.min.js" type="text/javascript"></script>
   
    <script src="<?php echo base_url();?>librerias/script/angular-route.js" type="text/javascript"></script>
     
    <script src="<?php echo base_url();?>librerias/script/datatable/angular-datatables.min.js"></script>
    
    <link href="<?php echo base_url();?>librerias/css/components-rounded.css"  rel="stylesheet" type="text/css">
   
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
     
   
  </head>
  <body ng-controller='mainController' class="skin-blue sidebar-mini" >

   
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SUNAT</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url();?>librerias/plantilla/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url();?>librerias/plantilla/dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url();?>librerias/plantilla/dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url();?>librerias/plantilla/dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo base_url();?>librerias/plantilla/dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a  class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url();?>librerias/plantilla/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"> <?php echo $this->session->userdata('nombre_user'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url();?>librerias/plantilla/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $this->session->userdata('nombre_user').' '.$this->session->userdata('apellido_user'); ?> - Web Developer
                      <small>Arquitecto de Aplicaciones 2018</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#mi-perfil" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">

                     
                      <a href="<?php echo base_url();?>index.php/login/logout" class="btn btn-default btn-flat">Salir</a>
                    

                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <div class="slimScrollDiv">
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url();?>librerias/plantilla/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <?php echo $this->session->userdata('nombre_user'); ?>

              <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $this->session->userdata('nombre'); ?></a>
            </div>
          </div>
           
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            
            <li class="treeview">
                 <a href="#inicio">
                  <i class="fa fa-dashboard"></i> <span>Inicio</span>
              </a>
              
            </li>
            
            <!-- RRHH-->
            <?php if($this->session->userdata('perfil') == 1) { ?> 
            <li class="treeview"><a href="#perfiles"><i class="fa fa-dashboard"></i> <span>Perfiles</span></a> </li>
            <li class="treeview"><a href="#usuarios"><i class="fa fa-dashboard"></i> <span>Usuarios</span></a> </li>
            <li class="treeview"><a href="#dimensiones"><i class="fa fa-dashboard"></i> <span>Dimensiones</span></a> </li>
            <li class="treeview"><a href="#variables"><i class="fa fa-dashboard"></i> <span>Variables</span></a> </li>
            <li class="treeview"><a href="#" ><i class="fa fa-dashboard"></i> <span>Cuestionario</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                   
                  <li><a href="#asig-cuestionario"><i class="fa fa-circle-o"></i> Asignación Cuestionario </a></li>
                  <li><a href="#reg-cuestionario"><i class="fa fa-circle-o"></i> Registro Cuestionario </a></li>
              </ul>
            </li>


            <li class="treeview"><a href="#" ><i class="fa fa-dashboard"></i> <span>Graficos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="#graficos-variables"><i class="fa fa-circle-o"></i> Graficos de Variables </a></li>
                  <li><a href="#graficos-dimensiones"><i class="fa fa-circle-o"></i> Graficos de Dimensiones </a></li>
              </ul>
            </li>

            <li class="treeview"><a href="#graficos-historicos"><i class="fa fa-dashboard"></i> <span>Graficos Historicos</span></a> </li>
            
            <li class="treeview"><a href="#sugerencias"><i class="fa fa-dashboard"></i> <span>Sugerencias</span></a> </li>
            <li class="treeview"><a href="#problemas"><i class="fa fa-dashboard"></i> <span>Problemas</span></a> </li>
            <li class="treeview"><a href="#estrategias"><i class="fa fa-dashboard"></i> <span>Estrategias</span></a> </li>
            
             
            <?php } ?>

            <!-- COLABORADOR INSI -->
            <?php if($this->session->userdata('perfil') == 2) { ?>

            <li class="treeview"><a href="#" ><i class="fa fa-dashboard"></i> <span>Cuestionario</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                   
                  <li><a href="#reg-cuestionario"><i class="fa fa-circle-o"></i> Registro Cuestionario </a></li>
              </ul>
            </li>

             
            <li class="treeview"><a ><i class="fa fa-dashboard"></i> <span>Graficos</span><i class="fa fa-angle-left pull-right"></i> </a> 
                <ul class="treeview-menu">
                  <li><a href="#graficos-variables"><i class="fa fa-circle-o"></i> Graficos de Variables </a></li>
                  <li><a href="#graficos-dimensiones"><i class="fa fa-circle-o"></i> Graficos de Dimensiones </a></li>
              </ul>
            </li>


            <li class="treeview"><a href="#graficos-historicos"><i class="fa fa-dashboard"></i> <span>Graficos Historicos</span></a> </li>
            
            <li class="treeview"><a href="#problemas"><i class="fa fa-dashboard"></i> <span>Problemas</span></a> </li>
            <li class="treeview"><a href="#estrategias"><i class="fa fa-dashboard"></i> <span>Estrategias</span></a> </li>
            <li class="treeview"><a href="#sugerencias"><i class="fa fa-dashboard"></i> <span>Sugerencias</span></a> </li>
            <li class="treeview"><a href="#medidas-correctivas"><i class="fa fa-dashboard"></i> <span>Medidas Correctivas</span></a> </li>

            <?php } ?>

            <!-- GERENTE Y/O JEFE -->
            <?php if($this->session->userdata('perfil') == 3) { ?>

            <li class="treeview"><a href="#dimensiones"><i class="fa fa-dashboard"></i> <span>Dimensiones</span></a> </li>
            <li class="treeview"><a href="#variables"><i class="fa fa-dashboard"></i> <span>Variables</span></a> </li>
             <li class="treeview"><a ><i class="fa fa-dashboard"></i> <span>Graficos</span><i class="fa fa-angle-left pull-right"></i> </a>
                <ul class="treeview-menu">
                  <li><a href="#graficos-variables"><i class="fa fa-circle-o"></i> Graficos de Variables </a></li>
                  <li><a href="#graficos-dimensiones"><i class="fa fa-circle-o"></i> Graficos de Dimensiones </a></li>
              </ul>
            </li>
            <li class="treeview"><a href="#graficos-historicos"><i class="fa fa-dashboard"></i> <span>Graficos Historicos</span></a> </li>
            
            <li class="treeview"><a href="#problemas"><i class="fa fa-dashboard"></i> <span>Problemas</span></a> </li>
            <li class="treeview"><a href="#estrategias"><i class="fa fa-dashboard"></i> <span>Estrategias</span></a> </li>
            <li class="treeview"><a href="#sugerencias"><i class="fa fa-dashboard"></i> <span>Sugerencias</span></a> </li>
            
            <?php } ?>



            <!--
            <li class="treeview"><a href="#"><i class="fa fa-dashboard"></i> <span>Empleados</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#mecanicos"><i class="fa fa-circle-o"></i> Mecanicos </a></li>
                <li><a href="#asistentes"><i class="fa fa-circle-o"></i> Asistentes </a></li>
              </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-dashboard"></i> <span>Productos</span>  <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="#articulos"><i class="fa fa-circle-o"></i> Articulos </a></li>
                <li><a href="#servicios"><i class="fa fa-circle-o"></i> Servicios </a></li>
            </ul>

            </li>
            <li class="treeview"><a href="#"><i class="fa fa-dashboard"></i> <span>Documento</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#factura"><i class="fa fa-circle-o"></i> Generar Factura </a></li>
                <li><a href="#Busqueda-Detalle-Factura"><i class="fa fa-circle-o"></i> Busca Detalle Factura </a></li>
                <li><a href="#boleta"><i class="fa fa-circle-o"></i> Generar Boleta </a></li>
              </ul>
            </li>
            
             <li class="treeview"><a href="#"><i class="fa fa-dashboard"></i> <span>Configuracion</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#configuracion_documento"><i class="fa fa-circle-o"></i> Configuracion Documento </a></li>
                <li><a href="#ver-transacciones"><i class="fa fa-circle-o"></i> Reporte de transacciones </a></li>
                 
              </ul>
            </li>

             <li class="treeview"><a href="#"><i class="fa fa-dashboard"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#ventas-por-fecha"><i class="fa fa-circle-o"></i> Ventas por fecha </a></li>
                <li><a href="#boleta"><i class="fa fa-circle-o"></i> Productos mas vendidos </a></li>
                <li><a href="#boleta"><i class="fa fa-circle-o"></i> Servicios mas solicitados </a></li>
                <li><a href="#boleta"><i class="fa fa-circle-o"></i>Totol Ventas </a></li>
              </ul>
            </li> -->

              

         </ul>
        </section>
        <!-- /.sidebar -->
        </div>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header page-header">
          <h1>
            {{titulo}}
            <small>{{subtitulo}}</small>
            
          </h1>
          
        </section>
      
        <!-- Main content -->
        <div class="content" ng-view>
             
        </div><!-- /.content -->

      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; Junio-2019 by <a href="https://www.facebook.com/HHAlanHH"> Alan Huitron</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class='control-sidebar-menu'>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class='control-sidebar-menu'>
              <li>
                <a href='javascript::;'>
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-waring pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->

          <!-- Settings tab content -->
         
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url();?>librerias/plantilla/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url();?>librerias/plantilla/plugins/fastclick/fastclick.min.js' type="text/javascript"></script> 
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>librerias/plantilla/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
   <!-- <script src="<?php echo base_url();?>plantilla/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script> -->
    <!-- jvectormap -->
    <!--<script src="<?php echo base_url();?>plantilla/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>plantilla/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script> -->
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url();?>librerias/plantilla/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <!-- <script src="<?php echo base_url();?>plantilla/plugins/chartjs/Chart.min.js" type="text/javascript"></script>-->

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?php echo base_url();?>librerias/plantilla/dist/js/pages/dashboard2.js" type="text/javascript"></script>-->

    <!-- AdminLTE for demo purposes -->
    <!--<script src="<?php echo base_url();?>plantilla/dist/js/demo.js" type="text/javascript"></script>-->
    <script src="<?php echo base_url();?>librerias/script/blockui-angular/angular-block-ui.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>librerias/script/ui-boostrap/ui-boostrap.js" type="text/javascript"></script>
    

    <script src="<?php echo base_url();?>librerias/script/highcharts.js"  type="text/javascript"></script>
    <script src="<?php echo base_url();?>librerias/script/highcharts-3d.js"  type="text/javascript"></script>
    <script src="<?php echo base_url();?>librerias/script/exporting.js"  type="text/javascript"></script>
    <script src="<?php echo base_url();?>librerias/script/export-data.js"  type="text/javascript"></script>

<!--
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
  -->
  
    
     
    
    

    <script src="<?php echo base_url();?>librerias/angular/main.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/natural.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/juridico.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/factura.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/articulo.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/configuracion_documento.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/reportes.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/detallefactura.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/perfiles.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/usuarios.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/dimensiones.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/variables.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/cuestionario.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/graficosVariables.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/graficosDimensiones.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/graficosHistorico.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/sugerencia.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/problemas.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/estrategia.js"></script>
    <script src="<?php echo base_url();?>librerias/angular/medida.js"></script>
    
    
    
     <script>
    $('.sidebar-menu').slimScroll({
        //width:20px;
        height:'500px',
        color:'red'
    });
    </script>
  </body>
</html>