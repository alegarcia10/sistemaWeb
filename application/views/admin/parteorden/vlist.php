<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
            <a href="<?php echo base_url(); ?>mantenimiento/cparteorden/cadd/<?php echo $ordenindex->IdOrden; ?>" class="btn  btn-flat" id="botonVioleta"><span class="fa fa-plus"></span> Agregar Tarea</a>
        </div>
    </section>
    <section class="content" id="cuerpo">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row" id="datos">
                    <div class="col-md-12">
                        <h1 id="H1A">DETALLES ORDEN</h1>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-4">
                        <h4>FECHA: <?=   date("d-m-Y", strtotime("$ordenindex->FechaRecepcion "));?> </h4>
                    </div>
                    <div class="col-md-4">
                        <h4>TAREA: <?= $ordenindex->TareaDesarrollar ?> </h4>
                    </div>
                    <div class="col-md-4">
                        <h4>PRECIO: <?= $ordenindex->Precio ?> </h4>
                    </div>
                    <div class="col-md-4">
                        <h4>CLIENTE: <?= $ordenindex->IdCliente ?> </h4>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <H3>LISTA DE TAREAS</H3>
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <p><?php echo $this->session->flashdata('error') ?> </p>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-3">
                                <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar Orden..">
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-hover order-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tarea a Desarrollar</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Estado</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($ordenindex); die;
                                        ?>
                                        <?php if (!empty($parteordenindex)) : ?>
                                            <?php foreach ($parteordenindex as $atributos) : ?>
                                                <tr>
                                                    <td><?php echo $atributos->IdParte; ?></td>
                                                    <td><?php echo $atributos->TareaDesarrollada; ?></td>
                                                    <td><?php echo date("d-m-Y", strtotime("$atributos->FechaInicio"));?></td>
                                                    <td><?php echo date("d-m-Y", strtotime("$atributos->FechaFin"));?></td>
                                                    <td><?php if ($atributos->Completa == 1){ echo 'Completa';}else{echo 'Pendiente';} ; ?></td>
                                                    <?php $data = $atributos->IdOrden; ?>
                                                    <td>
                                                        <div class="btn-group">

                                                            <a title="Modificar" href="<?php echo base_url(); ?>mantenimiento/cparteorden/cedit/<?php echo $atributos->IdParte; ?>" class="btn btn-info ">
                                                                <span class="fa fa-pencil"></span>
                                                            </a>
                                                            <a title="Eliminar" href="<?php echo base_url(); ?>mantenimiento/cparteorden/cdelete/<?php echo $atributos->IdParte; ?>" class="btn btn-danger btn-remove">
                                                                <span class="fa fa-remove"></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6 form-group">
                                <a class="btn btn-success" href="<?php echo base_url(); ?>mantenimiento/corden">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
