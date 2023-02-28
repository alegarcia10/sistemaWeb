<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Estados de Trabajo
            
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                
                <?php if ($this->session->flashdata('correcto')) : ?>
                    <div class="alert alert-success">
                        <p><?php echo $this->session->flashdata('correcto') ?></p>
                    </div>
                <?php endif; ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                          <h2>Filtros</h2>
                        </div>
                      <form action="<?php echo base_url(); ?>" method="POST">
                                <div class="col-sm-2 form-group">
                                  <label for="fechaini">Inicio</label>
                                  <input type="date" id="txtfechaini" name="txtfechaini" class="form-control" min="2020-01-01" max="2100-12-31" value="<?php echo set_value('txtfechaini') ?>">
                                </div>
                                <div class="col-sm-2 form-group">
                                  <label for="fechafin">Fin</label>
                                  <input type="date" id="txtfechafin" name="txtfechafin" class="form-control" min="2020-01-01" max="2100-12-31" value="<?php echo set_value('txtfechafin') ?>">
                                </div>
                                <br>
                                <div class="col-sm-10 form-group">
                                    <button type="submit" class="btn btn-success">Buscar</button>
                                </div>
                            </form>

                            <form action="<?php echo base_url();?>mantenimiento/ctrabajos/indexFiltroColumnas" method="POST">   
                                <div class="col-md-12">
                                </div>
                                <div class="col-sm-1 form-group">
                                    <label>Fecha</label>
                                    <input class="chk_input" type="checkbox" id="fecha" name="fecha" data-width="20" data-height="20" />
                                    <span class="checkmark"></span>
                                </div>
                                <div class="col-sm-1 form-group">
                                <label>Tarea</label>
                                <input class="chk_input" type="checkbox" id="tarea" name="tarea" data-width="20" data-height="20" />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-sm-1 form-group">
                                <label>Gastos</label>
                                <input class="chk_input" type="checkbox" id="gastos" name="gastos" data-width="20" data-height="20" />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-sm-1 form-group">
                                <label>A facturar</label>
                                <input class="chk_input" type="checkbox" id="monto" name="monto" data-width="20" data-height="20" />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-sm-1 form-group">
                                <label>Cliente</label>
                                <input class="chk_input" type="checkbox" id="cliente" name="cliente" data-width="20" data-height="20" />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-sm-1 form-group">
                                <label>Estado</label>
                                <input class="chk_input" type="checkbox" id="estado" name="estado" data-width="20" data-height="20" />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-sm-12 form-group">
                                <button type="submit" id=boton onclick="mostrar();" class="btn btn-success">Mostrar</button>
                            </div>
                        </form>
                        <div class="col-md-12">
                          <h3>Listado Trabajos</h3>
                        </div>
                        <table id="tablaordena" class="table table-bordered table-hover order-table1">
                            <thead>
                                <tr>
                                    <div id="fecha">
                                    <th>Fecha Visita</th>
                                    </div>
                                    <th>Detalle Trabajo</th>
                                    
                                    <th>Monto S/IVA</th>
                                    <th>Materiales S/IVA</th>
                                  
                                    <th>Cliente</th>
                                 
                                 
                                    <th>Estado</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($ordenindex)) : ?>
                                    <?php foreach ($ordenindex as $atributos) :?>
                                        <tr>
                                            
                                            <td width="10%"><?php echo date("d-m-Y", strtotime("$atributos->FechaRecepcion")); ?></td>
                                            <td width="24%"><?php echo $atributos->TareaDesarrollar; ?></td>
                                           
                                             <td width="8%">$<?php echo number_format($atributos->Gastos, 2); ?></td>
                                            <td width="8%">$<?php echo number_format($atributos->Precio, 2); ?></td>
                                            <td width="15%"><?php echo $atributos->Nombre; ?></td>
                                            <td width="10%"><?php if ($atributos->Completa == '1')
                                                    { echo 'Completada';}elseif($atributos->Estado == 0)
                                                    { echo 'Pendiente';}elseif($atributos->Estado == 1)
                                                    { echo 'Recibida';}elseif($atributos->Estado == 2)
                                                    { echo 'En Curso';}elseif($atributos->Estado == 3)
                                                    { echo 'Finalizada';}else{ echo 'No tiene tareas';} ; ?></td>
                                          
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
    $('#tablaordenc').DataTable({
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
               "order": [[ 0, "desc" ]]
          });
})

function mostrar(){
    document.getElementById("fecha").style.display = 'none';
}
</script>