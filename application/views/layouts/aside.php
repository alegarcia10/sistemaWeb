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
                        <?php if (!empty($rolesindex)) : ?>
                                            <?php foreach ($rolesindex as $atributos) : ?>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>mantenimiento/ccliente" <?=(!empty($rolesindex->Cliente)&&$rolesindex->Cliente=="1")?'enabled':'disabled'?> /> <i class="fa fa-circle-o"></i> Clientes</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/ctecnico"><i class="fa fa-circle-o"></i> Técnicos</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/corden"><i class="fa fa-circle-o"></i> Órdenes</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>mantenimiento/cusuario"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/croles"><i class="fa fa-circle-o"></i>Roles</a></li>
                        </ul>
                    </li>
                </ul>
                                <?php endforeach ?>
                    <?php endif; ?>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->
