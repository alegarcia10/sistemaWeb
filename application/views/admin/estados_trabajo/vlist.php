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
                
                <div id="idColumns" class="container w-100">
                    </div>

                            
                        <div class="col-md-12">
                          <h3>Listado Trabajos</h3>
                        </div>
                        <table id="tablaordenc" class="table table-bordered table-hover order-table1">
                            <thead>
                                <tr>
                                    <th>Fecha Visita</th>

                                    <th>Cliente</th>
                                    
                                    <th>Detalle Trabajo</th>

                                    <th>Estado</th>
                                    
                                    <th>Técnicos</th>

                                    <th>Monto S/IVA</th>
                                    
                                    <th>Materiales S/IVA</th>
                                  
                                    <th>Ganancia</th>

                                    <th>HH Invertidas</th>

                                    <th>Rentabilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($ordenindex)) : ?>
                                    <?php foreach ($ordenindex as $atributos) :?>
                                        <tr>
                                            
                                            <td width="10%"><?php echo date("d-m-Y", strtotime("$atributos->FechaRecepcion")); ?></td>
                                            <td width="15%"><?php echo $atributos->Nombre; ?></td>
                                            <td width="24%"><?php echo $atributos->TareaDesarrollar; ?></td>
                                            <td width="10%"><?php if ($atributos->Completa == '1')
                                                    { echo 'Completada';}elseif($atributos->Estado == 0)
                                                    { echo 'Pendiente';}elseif($atributos->Estado == 1)
                                                    { echo 'Recibida';}elseif($atributos->Estado == 2)
                                                    { echo 'En Curso';}elseif($atributos->Estado == 3)
                                                    { echo 'Finalizada';}else{ echo 'No tiene tareas';} ; ?></td>
                                            <td width="15%"><?php echo $atributos->tecnicos; ?></td>
                                             <td width="8%">$<?php echo number_format($atributos->Gastos, 2); ?></td>
                                            <td width="8%">$<?php echo number_format($atributos->Precio, 2); ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
<style>

.dt-button-collection .dt-button.buttons-columnVisibility {
    background: none !important;
    background-color: transparent !important;
    box-shadow: none !important;
    border: none !important;
    padding: 0.25em 1em !important;
    margin: 0 !important;
    text-align: left !important;
}
.dt-button-collection .buttons-columnVisibility:before,
.dt-button-collection .buttons-columnVisibility.active span:before {
    display:block;
    position:absolute;
    top:1.2em;
    left:0;
    width:12px;
    height:12px;
    box-sizing:border-box;
}
.dt-button-collection .buttons-columnVisibility:before {
    content:' ';
    margin-top:-8px;
    margin-left:10px;
    border:1px solid black;
    border-radius:3px;
}
.dt-button-collection .buttons-columnVisibility.active span:before {
    font-family: 'Arial' !important;
    content:'\2714';
    margin-top: -15px;
    margin-left: 12px;
    text-align: center;
    text-shadow: 1px 1px #fff, -1px -1px #fff, 1px -1px #fff, -1px 1px #fff;
}
.dt-button-collection .buttons-columnVisibility span {
    margin-left:17px;    
}

</style>

<script type="text/javascript">


$(document).ready(function () {
    $('#tablaordenc').DataTable({
               "language": {
                   "lengthMenu": "Mostrar _MENU_ registros por página",
                   "zeroRecords": "No se encontraron resultados en su búsqueda",
                   "searchPlaceholder": "Buscar Órdenes",
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
               "order": [[ 0, "desc" ]],
               //responsive: "true",
               select: {
      style: "multi",
      selector: "td:first-child",
    },
               dom: 'Bfrtip',
               scrollY:        "300px",
               scrollX:        true,
               scrollCollapse: true,
               buttons: [ 
                {
                    extend: 'excelHtml5',
                    exportOptions:{
                            columns: ':visible'
                    },
                    text: '<i class="fas fa-file-excel"></i>',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions:{
                            columns:':visible'
                    },
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend: 'print',
                    exportOptions:{
                            columns:':visible'
                    },
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                },
                {
                    extend :'colvis',
                    text: "Columnas",
                    postfixButtons: ['colvisRestore'],
                        buttons : [{
                            extend: 'columnsToggle',
                            action: function (e, dt, node, config) {
                                alert('Activated!');
                                console.log("Activated!");
                            },
                        }]
                    
                }
               
            ],
            fixedColumns:{
                left: 2
            },
            columnDefs: [{
                targets: -1,
                visible: false
            }]           
                    
          });
        	
        
});






/*<div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                          <h2>Filtros</h2>
                        </div>
                      <form action="</*?php echo base_url(); ?>" method="POST">
                                <div class="col-sm-2 form-group">
                                  <label for="fechaini">Inicio</label>
                                  <input type="date" id="txtfechaini" name="txtfechaini" class="form-control" min="2020-01-01" max="2100-12-31" value="</**?php echo set_value('txtfechaini') ?>">
                                </div>
                                <div class="col-sm-2 form-group">
                                  <label for="fechafin">Fin</label>
                                  <input type="date" id="txtfechafin" name="txtfechafin" class="form-control" min="2020-01-01" max="2100-12-31" value="</**?php echo set_value('txtfechafin') ?>">
                                </div>
                                <br>
                                <div class="col-sm-10 form-group">
                                    <button type="submit" class="btn btn-success">Buscar</button>
                                </div>
                            </form>*/ 

</script>