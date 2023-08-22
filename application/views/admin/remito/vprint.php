<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
                           <h2>Remito</h2>    
        </div>
    </section>
    <section class="content" >
        <div class="box box-solid" style="margin-top: 1px;">
            <div class="box-body">
                <div class="col-sm-3 form-group" id="botones" style="margin-left: -85px;">
                           <a class="btn btn-info" style="margin-bottom: 10px; margin-rigth: 10px;" href="<?php echo base_url();?>mantenimiento/cremitos">Volver</a>
                           <button id="printButton" style="margin-bottom: 10px; margin-rigth: 10px;" class="btn btn-success" onclick="printDiv()" >Imprimir</button>
                         
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="cuerpo" id='areaImprimir'>
                            <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/Remito.css" >
                            <div class="row">
                                <div class="col-md-12" id="celdas1">
                                    <div class="row" >
                                        <div class="col-md-3 logo">
                                            <img src="<?php echo base_url()?>assets/template/dist/img/logo presus.png" width="100">
                                        </div>
                                        <div class="col-md-5 datos">
                                            <p>Elecctrónica BIOS</p>
                                            <p>Cereseto Oeste 156</p>
                                            <p>Capital San Juan</p>
                                            <p>Teléfono: 264-4275852</p>
                                            <p>Correo Electrónico: electronicabios@gmail.com</p>
                                        </div>
                                        <div class="col-md-3 datos2">
                                            <h2>REMITO</h2>
                                            <h5>N°<?php echo $remito->IdRemito; ?></h5>
                                            <h5>Fecha: <?php echo date("d/m/Y", strtotime("$remito->fecha")); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="celdas3">
                                    <div class="row" >
                                        <div class="col-md-6 cliente">
                                            <p>CLIENTE: <?php echo $cliente->Nombre; ?></p>
                                            <p>CUIT: <?php echo $cliente->DniCuit; ?></p>
                                            
                                        </div>
                                        <div class="col-md-6 cliente">
                                            <p>DOMICILIO: <?php echo $cliente->Domicilio; ?></p>
                                            <p>PROVINCIA: <?php echo $cliente->Provincia; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="celdas4">
                                    <div>
                                        <table class="table table-primary">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Producto</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Precio</th>
                                                    </tr>
                                                </thead>

                                                <tbody id='tbody1'>
                                                <?php if (!empty($producto)) : ?>
                                                    <?php foreach ($producto as $atributos) : ?>
                                                        <tr>
                                                            <td><?php echo $atributos->IdProducto; ?></td>
                                                            <td><?php echo $atributos->producto; ?></td>
                                                            <td><?php echo $atributos->cantidad; ?></td>
                                                            <td><?php echo $atributos->precio; ?></td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <h1>TOTAL: <?php echo '$'.$total; ?></h1>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>  
</div>

<script>

function printDiv() {
          var objeto=document.getElementById('printButton'); 
   
   //obtenemos el objeto a imprimir
          var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
          ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
          ventana.document.close();  //cerramos el documento
          ventana.print();  //imprimimos la ventana
          ventana.close();  //cerramos la ventana
        }
    
    
   /* // Función para imprimir la factura
    function printInvoice() {
      const printButton = document.getElementById('printButton');
      printButton.style.display = 'none'; // Ocultar el botón antes de imprimir

      window.print();

      printButton.style.display = 'block'; // Mostrar el botón después de imprimir
    }

    // Asociar la función de impresión al botón
    const printButton = document.getElementById('printButton');
    printButton.addEventListener('click', printInvoice);*/
  </script>


