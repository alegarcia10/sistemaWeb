<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Clientes
            <small>Listado de Clientes</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-9">
                        <a href="<?php echo base_url(); ?>mantenimiento/ccliente/cadd" class="btn btn-flat" id="botonVioleta"><span class="fa fa-plus"></span> Agregar Cliente</a>
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
                      <br>
                        <table id="tablacliente" class="table table-bordered table-hover order-table1">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>CUIT</th>
                                  <th>Nombre</th>
                                  <th>Domicilio</th>
                                  <th>Provincia</th>
                                  <th>Operaciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if (!empty($clienteindex)) : ?>
                                  <?php foreach ($clienteindex as $atributos) :?>
                                      <tr>
                                          <td ><?php echo $atributos->IdCliente; ?></td>
                                          <td ><?php echo $atributos->DniCuit; ?></td>
                                          <td ><?php echo $atributos->Nombre; ?></td>
                                          <td ><?php echo $atributos->Domicilio; ?></td>
                                          <td ><?php echo $atributos->Provincia; ?></td>
                                          <td  >
                                              <div class="btn-group">
                                                <a href="<?php echo base_url(); ?>mantenimiento/ccliente/cedit/<?php echo $atributos->IdCliente; ?>" class="btn btn-info" title="Modificar">
                                                    <span class="fa fa-pencil"></span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>mantenimiento/ccliente/cdelete/<?php echo $atributos->IdCliente; ?>" class="btn btn-danger btn-remove deleteCliente" title="Eliminar">
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
            </div>
        </div>
    </section>
</div>


<script type="text/javascript">


$(document).ready(function () {
    $('#tablacliente').DataTable({
               "language": {
                   "lengthMenu": "Mostrar _MENU_ registros por pagina",
                   "zeroRecords": "No se encontraron resultados en su busqueda",
                   "searchPlaceholder": "Buscar Cliente",
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
