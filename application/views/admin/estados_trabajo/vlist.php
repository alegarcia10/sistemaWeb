<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Estados de Trabajo
            
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php if ($this->session->flashdata('correcto')) : ?>
                                <div class="alert alert-success">
                                    <p><?php echo $this->session->flashdata('correcto') ?></p>
                                </div>
                            <?php endif; ?>

                            <div class="col-md-12">
                           
                                        <div class="input-daterange">
                                                <div class="col-md-4">
                                                <input type="date" name="start_date"       id="start_date" class="form-control" />
                                                </div>
                                            <div class="col-md-4">
                                                <input type="date" name="end_date" id="end_date"    class="form-control" />
                                            </div>      
                                        
                                        </div>
                                        
                                        <table class="table" id="rapport">
                                                <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Reférence</th>
                                                            <th>Date</th>
                                                        </tr>
                                                    </thead>
                                                <tbody>
                                                    <tr>
                                                            <td>1</td>
                                                            <td>XZDF</td>
                                                            <td>2018-10-26 15:04:13</td>
                                                        </tr>
                                                    <tr>
                                                            <td>2</td>
                                                            <td>XZDpo</td>
                                                            <td>2018-10-23 15:04:13</td>
                                                    </tr>
                                                    <tr>
                                                            <td>4</td>
                                                            <td>XZDmoQSD</td>
                                                            <td>2018-09-10 15:04:13</td>
                                                    </tr>
                                            </tbody>
                                        </table>
                            </div>
                        
                        </div>  
                    
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
            /*position:relative;
            margin-top: 10px;*/
            margin-bottom: 10px;
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
            top: 2px;
            right: 10px;
            float:left;
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
               "createdRow":function(row,data,index){
                if(data[0]=='-'){
                    $('td',row).eq(0).css({
                        'background-color':'#ff5252',
                        'color':'white'
                    })
                }
            },
               "order": [[ 0, "desc" ]],
               //responsive: "true",
               scrollX:true,
    
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
            'columnDefs': [
       { targets: [10,11,12,13,14], visible: false},
       {searchable: false, targets: [3,5,6,7,8,9,10,11,12,13,14]  }
    ],
            
           
            fnDrawCallback: function () {
       $('.buttons-colvis').attr("id", "showHideColumnButton").removeClass('dt-buttonbuttons-collection buttons-colvis');}
            
       
                     
                    
          });
          //table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
          $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min =  $('#start_date').val();
        var max =  $('#end_date').val();
        var date_pursached =  data[2]  || 0; // use data for the date column
 
         if (min == "" && max == "") { return true; }
         if (min == "" && date_pursached <= max) { return true;}
         if(max == "" && date_pursached >= min) {return true;}
         if (date_pursached <= max && date_pursached >= min) { return true; }
         return false;
    }
);
 
$(document).ready(function() {
    var table = $('#rapport').DataTable();

     
    // Event listener to the two range filtering inputs to redraw on input
    $('#start_date, #end_date').change( function() {
        table.draw();
    } );

} );

   
    


          
        
});


 
// Custom filtering function which will search data in column four between two values


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


                            /* */

</script>