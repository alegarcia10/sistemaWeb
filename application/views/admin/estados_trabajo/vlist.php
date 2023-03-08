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
                    <form action="<?php echo base_url(); ?>mantenimiento/corden/cinsert" method="POST">
                                <div class="col-sm-3 form-group">
                                  <label for="fechaini">INICIO</label>
                                  <input type="date" id="txtfecha" name="txtfecha" class="form-control" min="2020-01-01" max="2100-12-31" value="<?php echo set_value('txtfecha') ?>">
                                </div>
                                <div class="col-sm-3 form-group">
                                  <label for="fechafin">FIN</label>
                                  <input type="date" id="txtfecha" name="txtfecha" class="form-control" min="2020-01-01" max="2100-12-31" value="<?php echo set_value('txtfecha') ?>">
                                </div>
                                <div class="col-sm-12 form-group">
                                  
                                  <button type="submit" class="btn btn-success">Buscar</button> 
                                </div>
                </form>
                <br>
                <br>
                <br>
                      
                            
                      
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
                                            <td width="15%"><?php echo $atributos->TEC; ?></td>
                                             <td width="8%">$<?php echo number_format($atributos->Precio, 2); ?></td>
                                            <td width="8%">$<?php echo number_format($atributos->Gastos, 2); ?></td>
                                            <td width="8%">$<?php echo  number_format($atributos->Ganancia, 2); ?></td>
                                            <td width="8%"><?php echo '00:00:00'//$atributos->HH; ?></td>
                                            <td width="8%"><?php echo '-'//$atributos->rentabilidad; ?></td>
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
/*estilo de boton columnas*/ 
.dt-button.buttons-columnVisibility {
              background: #3c8dbc !important;
              color: white !important;
             
              
           }
        .dt-button.buttons-columnVisibility.active {
              background: white !important;
              color: black !important;
              border-color: #3c8dbc !important;
              
           }


           div.dt-buttons{
            /*position:relative;*/
            margin-top: 10px;
            float:right;
           }

           div.dataTables_wrapper div.dataTables_length label{
            /*position:relative;
            position:relative;*/
            top: 30px;
           }

           div.dataTables_wrapper div.dataTables_info{
            position:absolute;
            bottom: 0;
            /*float:right;*/
           }
           div.dataTables_wrapper div.dataTables_filter {
            top: 40px;
            text-align: right;
            position: relative;
            }
           
</style>

<script type="text/javascript">


$(document).ready(function () {
   var table =  $('#tablaordenc').DataTable({
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
               responsive: "true",
    
               dom: '<"dt-buttons"Bf><"clear">lirtp',
               
               buttons: [ 
                {
                    extend :'colvis',
                    text:"Columnas",
                    className: 'btn btn-primary',
                    columnText : function ( dt, idx, title ) { return (idx+1)+': '+title; }
                    
                   
                    
                },
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
                }
                
               
            ],
           
            fnDrawCallback: function () {
       $('.buttons-colvis').attr("id", "showHideColumnButton").removeClass('dt-buttonbuttons-collection buttons-colvis');}
            
       
                     
                    
          });
          //table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
        	
        
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