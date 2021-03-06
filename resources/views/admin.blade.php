<!--
************************************************************************
************************************************************************
**                   *********** **** ************                    **
****                 **********        **********                    ***
*****                 ********          ********                    ****
******               Project: Cotizador Vidalta                   ******
*******                  Date: Oct-Nov 2015                      *******
******* ======================================================== *******
******         BackEnd developer: EnthyrosVanAkel in github       ******
*****            FrontEnd developer: miguueelo in github           *****
*******************  ============================== ********************
************************** For: QubitWorks  ****************************
******************************          ********************************
********************************       *********************************
*********************************     **********************************
**********************************   ***********************************
*********************************** ************************************
************************************************************************
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cotizaciones Vidaltta</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/admin/dist/css/skins/skin-black.min.css">

  </head>
  <body class="hold-transition skin-black sidebar-mini">
    <!-- Contenedor general -->
    <div class="wrapper">

      <!-- Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="/admin/cotizaciones" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
            <img src="/admin/img/vidalta.png" width="10px">
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <img src="/admin/img/vidalta.png" width="100px">
          </span>

        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
        </nav>
      </header> <!-- End Header -->

      <!-- Menu Lateral -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <li>
              <a href="/admin/cotizaciones">
                <i class="fa fa-file"></i> <span>Cotizaciones</span>
              </a>
            </li>
            <li>
              <a href="/admin/catalogo">
                <i class="fa fa-building"></i> <span>Departamentos</span>
              </a>
            </li>
            <li>
              <a href="0">
                <i class="fa fa-sign-out"></i> <span>Cerran Sesión</span>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside><!-- End Menu Lateral -->
      
      <!-- Contenedor -->
      <div class="content-wrapper">

      @yield('cotizacion')
      @yield('catalogo')
      @yield('predeterminado')
      @yield('escoger')
      @yield('opcional')
      @yield('arquitecto')
      @yield('tax')
      


      </div><!-- Contenedor -->
     
    </div> <!-- Contenedor general -->

     <!-- jQuery 2.1.4 -->
    <script src="/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/dist/js/app.min.js"></script>

    @yield('js')

  </body>

</html>
