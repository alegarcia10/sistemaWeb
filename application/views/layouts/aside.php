        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar" id="menu">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">

                    <!-- <li>
                        <a href="<?php echo base_url() ?>cdashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                     -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Menu</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        
                       
                    
                        <ul class="treeview-menu">
                        <?php if ($roles->cliente =="1") { ?>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/ccliente"> <i class="fa fa-circle-o"></i> Clientes</a></li>
                            <?php } ?>
                        <?php if ($roles->tecnico =="1") { ?>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/ctecnico"><i class="fa fa-circle-o"></i> Técnicos</a></li>
                        <?php } ?>
                        <?php if ($roles->ordenes =="1") { ?>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/corden"><i class="fa fa-circle-o"></i> Órdenes</a></li>
                        <?php } ?>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                        <?php if ($roles->usuarios =="0"&& $roles->roles =="0") { ?>
                            <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            <?php } ?>
                        </a>
                        <ul class="treeview-menu">
                        <?php if ($roles->usuarios =="1") { ?>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/cusuario"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                        <?php } ?>
                        <?php if ($roles->roles =="1") { ?>    
                            <li><a href="<?php echo base_url(); ?>mantenimiento/croles"><i class="fa fa-circle-o"></i>Roles</a></li>
                        <?php } ?>
                        </ul>
                    </li>
                </ul>
                                
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->
