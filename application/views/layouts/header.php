<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo base_url();?>assets/template/dist/img/iconoLogo.ico">
    <title>Sistema | CoolSoft</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/fontawesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <!-- DataTables -->

   

    
    

    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/DataTables-1.13.3/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/Buttons-2.3.5/css/buttons.bootstrap4.min.css"/>


    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/skins/_all-skins.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/diseño.css">
    <link href="<?php echo base_url();?>assets/select2-4.0.10/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/sweetalert/dist/sweetalert.css" rel="stylesheet" />


    <script src="<?php echo base_url();?>assets/template/jquery/jquery-3.6.0.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header" >
            <!-- Logo -->

            <a href="<?php echo base_url()?>cdashboard" class="logo" id="menu3">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="<?php echo base_url()?>assets/template/dist/img/ICONO COOLSOFT jpg.png" id="imgSmall"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"> <img src="<?php echo base_url()?>assets/template/dist/img/ICONO COOLSOFT jpg.png" id="img"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" id="menu2">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu" id="menu2">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!--<img src="<?php echo base_url()?>assets/template/dist/img/logo.jpg" class="user-image" alt="User Image"> -->
                                <span class="hidden-xs"><?php echo $this->session->userdata('nombre')?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <a href="<?php echo base_url();?>clogin/clogout"> Cerrar Sesión</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
