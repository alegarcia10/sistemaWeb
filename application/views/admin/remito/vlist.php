<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Remitos
            <small>Listado de Órdenes</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-9">
                        <a href="<?php echo base_url(); ?>mantenimiento/cremito/cadd" class="btn btn-flat" id="botonVioleta"><span class="fa fa-plus"></span> Agregar remito</a>
                    </div>
                </div>
                <?php if ($this->session->flashdata('correcto')) : ?>
                    <div class="alert alert-success">
                        <p><?php echo $this->session->flashdata('correcto') ?></p>
                    </div>
                <?php endif; ?>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                      <div class="col-md-12">
                          <h1>Remitos  Activos  <span class="fa fa-clock-o"></span></h1>
                      </div>
                        <table id="tablaremitoa" class="table table-bordered table-hover order-table1">
                            <thead>
                                <tr>
                                    <th>N° remito</th>
                                    <th>Fecha Recepción</th>
                                    <th>Tarea</th>
                                    <th>Gastos</th>
                                    <th>Monto a Facturar</th>
                                    <th>Cliente</th>
                                    <th>Estado Tarea</th>
                                    <th >Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($remitoindex)) : ?>
                                    <?php foreach ($remitoindex as $atributos) :?>
                                        <tr>
                                            <td width="5%"><?php echo $atributos->Idremito; ?></td>
                                            <td width="10%"><?php echo date("d/m/Y", strtotime("$atributos->FechaRecepcion")); ?></td>
                                            <td width="24%"><?php echo $atributos->TareaDesarrollar; ?></td>
                                            <td width="8%"> $<?php echo number_format($atributos->Gastos, 2); ?></td>
                                            <td width="8%">$<?php echo number_format($atributos->Precio, 2); ?></td>
                                            <td width="15%"><?php echo $atributos->Nombre; ?></td>
                                            <td width="10%"><?php if ($atributos->Completa == '1')
                                                    { echo 'Completada';}elseif($atributos->Estado == 0)
                                                    { echo 'Pendiente';}elseif($atributos->Estado == 1)
                                                    { echo 'Recibida';}elseif($atributos->Estado == 2)
                                                    { echo 'En Curso';}elseif($atributos->Estado == 3)
                                                    { echo 'Finalizada';}else{ echo 'No tiene tareas';} ; ?></td>
                                            <td width="20%" >
                                                <div class="btn-group">
                                                  <a href="<?php echo base_url(); ?>mantenimiento/cparteremito/listar/<?php echo $atributos->Idremito; ?>" class="btn btn-warning" title="Tareas">
                                                      <span class="fa fa-eye"></span>
                                                  </a>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cremito/cedit/<?php echo $atributos->Idremito; ?>" class="btn btn-info" title="Modificar">
                                                        <span class="fa-solid fa-pen"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cremito/cdelete/<?php echo $atributos->Idremito; ?>" class="btn btn-danger btn-remove deleteremito" title="Eliminar">
                                                        <span class="fa-solid fa-circle-xmark"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cremito/ccompleta/<?php echo $atributos->Idremito; ?>" class="btn btn-success completaremito" title="Completa">
                                                        <span class="fa fa-check-circle"></span>
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
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-12">
                        <h1>Órdenes Completas  <span class="fa fa-check-circle"></span></h1>
                    </div>
                    <br>

                        <table id="tablaremitoc" class="table table-bordered table-hover order-table2">
                            <thead>
                                <tr>
                                  <th>N° remito</th>
                                  <th>Fecha Recepción</th>
                                  <th>Tarea</th>
                                  <th>Gastos</th>
                                  <th>Monto Facturado</th>
                                  <th>Cliente</th>
                                  <th >Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($remitocompletas)) : ?>
                                    <?php foreach ($remitocompletas as $atributos) :?>
                                        <tr>
                                          <td width="5%"><?php echo $atributos->Idremito; ?></td>
                                          <td width="10%"><?php echo date("d/m/Y", strtotime("$atributos->FechaRecepcion")); ?></td>
                                          <td width="30%"><?php echo $atributos->TareaDesarrollar; ?></td>
                                          <td width="10%"> $<?php echo number_format($atributos->Gastos, 2); ?></td>
                                            <td width="10%">$<?php echo number_format($atributos->Precio, 2); ?></td>
                                          <td width="15%"><?php echo $atributos->Nombre; ?></td>
                                          <td width="20%" >
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cparteremito/listar/<?php echo $atributos->Idremito; ?>" class="btn btn-warning" title="Tareas">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cremito/cedit/<?php echo $atributos->Idremito; ?>" class="btn btn-info" title="Modificar">
                                                        <span class="fa-solid fa-pen"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cremito/cdelete/<?php echo $atributos->Idremito; ?>" class="btn btn-danger btn-remove deleteremitoCompleta" title="Eliminar">
                                                        <span class="fa-solid fa-circle-xmark"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cremito/cdescompleta/<?php echo $atributos->Idremito; ?>" class="btn btn-success reanudarremito" title="Reanudar">
                                                        <span class="fa-solid fa-clock"></span>
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
            </div>
        </div>
    </section>
</div>


<script type="text/javascript">


$(document).ready(function () {
  var table =  $('#tablaremitoc').DataTable({
               "language": {
                   "lengthMenu": "Mostrar _MENU_ registros por página",
                   "zeroRecords": "No se encontraron resultados en su búsqueda",
                   "searchPlaceholder": "Buscar Órdenes Completas",
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
               },
               "bStateSave": true,
               scrollX:true,
               "order": [[ 0, "desc" ]]
          });
          
});
</script>
