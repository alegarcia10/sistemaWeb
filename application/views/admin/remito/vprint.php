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
                           <button id="printButton" style="margin-bottom: 10px; margin-rigth: 10px;" class="btn btn-success">Imprimir</button>
                         
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="cuerpo" id='areaImprimir'>
                            <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/Remito.css" media="print">
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
                                        <div class="col-md-6 cliente1">
                                            <p>CLIENTE: <?php echo $cliente->Nombre; ?></p>
                                            <p>CUIT: <?php echo $cliente->DniCuit; ?></p>
                                            
                                        </div>
                                        <div class="col-md-6 cliente2">
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

    function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
    }
    
    
    // Función para imprimir la factura
    function printInvoice() {
      const printButton = document.getElementById('printButton');
      printButton.style.display = 'none'; // Ocultar el botón antes de imprimir

      window.print();

      printButton.style.display = 'block'; // Mostrar el botón después de imprimir
    }

    // Asociar la función de impresión al botón
    const printButton = document.getElementById('printButton');
    printButton.addEventListener('click', printInvoice);
  </script>
<style>
  .cuerpo {
    width: 210mm; /* Ancho A4 */
    height: 297mm; /* Alto A4 */
    margin: auto;
    margin-top: 10px !important;
    padding: 25px;
    border: 1px solid #ccc;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }

  #celdas1{
    border: 1px solid #ccc;
    border-radius: 15px;
    margin: 5px;
    height: 30mm !important;
  }
  #celdas3{
    border: 1px solid #ccc;
    border-radius: 15px;
    margin: 5px;
    height: 25mm !important;
  }
  #celdas4{
    border: 1px solid #ccc;
    border-radius: 15px;
    margin: 5px;
    height: 135mm !important;
  }

  .logo {
    margin-right: 2px;
    
  }
  .logo img{
    margin-top: 3mm;
    height: 20mm;
    width: 25mm;
  }
  .datos {
    font-size: 10px;
    padding: 0px !important;
    margin-top: 3mm;
  }
  .datos p {
    margin: 0 0 0px;

}
.datos2 {
    font-size: 10px;
    padding: 0px !important;
    margin-top: -2mm;
    text-align: right;
    margin-left: 5mm !important;
  }

  .cliente1 {
    font-size: 12px;
    padding: 0px !important;
    margin-top: 3mm;
  }
  .cliente1 p {
    margin-top: 2mm;
    margin-left: 2mm;
  }
  .cliente2 {
    font-size: 12px;
    padding: 0px !important;
    margin-top: 3mm;
  }
  .cliente2 p {
    margin-top: 2mm;
    margin-left: 2mm;
  }

  #celdas4 h1{
    position:absolute;
    bottom:5px;
    right:10px;
  }
  

  @media print {
  
    .cuerpo {
    width: 180mm; /* Ancho A4 */
    height: 250mm; /* Alto A4 */
    margin: auto;
    margin-top: 10px !important;
    padding: auto;
    border: 1px solid #ccc;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }

  #celdas1{
    border: 1px solid #ccc;
    border-radius: 15px;
    margin: 5px;
    height: 30mm !important;
  }
  #celdas3{
    border: 1px solid #ccc;
    border-radius: 15px;
    margin: 5px;
    height: 25mm !important;
  }
  #celdas4{
    border: 1px solid #ccc;
    border-radius: 15px;
    margin: 5px;
    height: 135mm !important;
  }

  .logo {
    margin-right: 2px;
    
  }
  .logo img{
    margin-top: 3%;
    height: 20%;
    width: 25%;
  }
  .datos {
    font-size: 10px;
    padding: 0px !important;
    margin-top: -15% !important;
    margin-left: 30% !important;
  }
  .datos p {
    margin: 0 0 0px;

}
.datos2 {
    font-size: 10px;
   
    margin-top: -15% !important;
    text-align: right;
    padding: 0 2% 0 0 !important;
  }

  .cliente1 {
    font-size: 12px;
    padding: 0px !important;
    
  }
  .cliente1 p {
  
  }
  .cliente2 {
    font-size: 12px;
    padding: 0px !important;
    margin-left: 25% !important;
    margin-top: -10% !important
  }
  .cliente2 p {
   
  }

  #celdas4 h1{
    position:absolute;
    bottom:5px;
    right:10px;
  }

  /* ... otros estilos para la impresión ... */
}
</style>

