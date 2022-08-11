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
                        <h1 id="H1A">DETALLES ÓRDEN</h1>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-4">
                        <h4>Fecha: <?=   date("d-m-Y", strtotime("$ordenindex->FechaRecepcion "));?> </h4>
                    </div>
                    <div class="col-md-4">
                        <h4>Cliente: <?= $ordenindex->Nombre ?> </h4>
                    </div>
                    <div class="col-md-4">
                        <h4>Gastos: $<?= $Gastos ?> </h4>
                    </div>
                    <div class="col-md-4">
                        <h4>Monto a Facturar: $<?= $ordenindex->Precio ?> </h4>
                    </div>
                    <div class="col-md-12">
                        <h4>Tarea: <?= $ordenindex->TareaDesarrollar ?> </h4>
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
                            <div class="col-md-12">
                                <div >
                                <table id="tablaparte" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="width:50px">Tarea Realizadaa</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Estado</th>
                                            <th>Operaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($parteordenindex)) : ?>
                                            <?php foreach ($parteordenindex as $atributos) : ?>
                                                <tr>
                                                    <td ><?php echo $atributos->IdParte; ?></td>
                                                    <td style="width:50px;"><?php echo $atributos->TareaDesarrollada; ?></td>
                                                    <td ><?php if($atributos->FechaInicio == null){ echo "-";}else{echo $atributos->FechaInicio;} ?></td>
                                                    <td ><?php if($atributos->FechaFin == null){ echo "-";}else{echo $atributos->FechaFin;} ?></td>
                                                    <td ><?php if ($atributos->Completa == 1){ echo 'Completada';}elseif($atributos->Estado == 0){ echo 'Pendiente';}elseif($atributos->Estado == 1){ echo 'Recibida';}elseif($atributos->Estado == 2){ echo 'En Curso';}elseif($atributos->Estado == 3){ echo 'Finalizada';}else{ echo '-';} ; ?></td>
                                                    <td>
                                                        <div class="btn-group">

                                                            <a title="Modificar" href="<?php echo base_url(); ?>mantenimiento/cparteorden/cedit/<?php echo $atributos->IdParte; ?>" class="btn btn-info ">
                                                                <span class="fa fa-pencil"></span>
                                                            </a>
                                                            <a title="Eliminar" href="<?php echo base_url(); ?>mantenimiento/cparteorden/cdelete/<?php echo $atributos->IdParte; ?>/<?php echo $atributos->IdOrden; ?>" class="btn btn-danger btn-remove deleteParte">
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

<script type="text/javascript">


$(document).ready(function () {
    $('#tablaparte').DataTable({
               "language": {
                   "lengthMenu": "Mostrar _MENU_ registros por página",
                   "zeroRecords": "No se encontraron resultados en su búsqueda",
                   "searchPlaceholder": "Buscar Tarea",
                   "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                   "infoEmpty": "No existen registros",
                   "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                   "search": "Buscar:",
                   "paginate": {
                       "first": "Primero",
                       "last": "Último",
                       "next": "Siguiente",
                       "previous": "Anterior"
                   },
               }
          });
})
</script>
