<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Remitos
            <small>Listado de Remitos</small>
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
                        <h1>Remitos <span class="fa fa-check-circle"></span></h1>
                    </div>
                    <br>

                        <table id="tablaremito" class="table table-bordered table-hover order-table2">
                            <thead>
                                <tr>
                                  <th>N° remito</th>
                                  <th>Fecha</th>
                                  <th>Cliente</th>
                                  <th>Vendedor</th>
                                  <th>Descripcion</th>
                                  <th>Monto Total</th>
                                  <th >Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($remitoindex)) : ?>
                                    <?php foreach ($remitoindex as $atributos) :?>
                                        <tr>
                                          <td width="5%"><?php echo $atributos->IdRemito; ?></td>
                                          <td width="10%"><?php echo date("d/m/Y", strtotime("$atributos->fecha")); ?></td>
                                          <td width="30%"><?php echo $atributos->cliente; ?></td>
                                          <td width="10%"><?php echo $atributos->vendedo; ?></td>
                                          <td width="15%"><?php echo $atributos->descripcion; ?></td>
                                          <td width="10%">$<?php echo number_format($atributos->montoTotal, 2); ?></td>
                                          <td width="20%" >
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cparteremito/listar/<?php echo $atributos->IdRemito; ?>" class="btn btn-warning" title="Tareas">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cremito/cedit/<?php echo $atributos->IdRemito; ?>" class="btn btn-info" title="Modificar">
                                                        <span class="fa-solid fa-pen"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cremito/cdelete/<?php echo $atributos->IdRemito; ?>" class="btn btn-danger btn-remove deleteremitoCompleta" title="Eliminar">
                                                        <span class="fa-solid fa-circle-xmark"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cremito/cdescompleta/<?php echo $atributos->IdRemito; ?>" class="btn btn-success reanudarremito" title="Reanudar">
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
  var table =  $('#tablaremito').DataTable({
               "language": {
                   "lengthMenu": "Mostrar _MENU_ registros por página",
                   "zeroRecords": "No se encontraron resultados en su búsqueda",
                   "searchPlaceholder": "Buscar Remitos ",
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
