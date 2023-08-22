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
                                        <div class="col-md-5 logo">
                                            <img src="<?php echo base_url()?>assets/template/dist/img/logo presus.png" width="100">
                                        </div>
                                        <div class="col-md-2 datos">
                                            <p>X</p>
                                        </div>
                                        <div class="col-md-5 datos2">
                                            <h5>REMITO N°<?php echo $remito->IdRemito; ?></h5>
                                            <p>COMPROBANTE NO VALIDO COMO FACTURA</p>
                                            <p>Fecha: <?php echo date("d/m/Y", strtotime("$remito->fecha")); ?></p>
                                        </div>
                                        <div class="col-md-6 datos3">
                                          <p>Cereseto Oeste 156  - Teléfono: 264-4275852</p>
                                    
                                        </div>
                                        <div class="col-md-6 datos3">
                                            <p>C.U.I.T: 30-71621552-7 </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="celdas3">
                                    <div class="row" >
                                        <div class="col-md-6 cliente1">
                                            <p>Sr./es: <?php echo $cliente->Nombre; ?></p>
                                            <p>C.U.I.T: <?php echo $cliente->DniCuit; ?></p>                                            
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
                                <div class="col-md-12" id="celdas5">
                                    <div class="row" >
                                        <div class="col-md-4 registrovacio1">                                      
                                        </div>
                                        <div class="col-md-4 registrovacio2">  
                                        </div>
                                        <div class="col-md-4 registrovacio3">   
                                        </div>
                                        <div class="col-md-4 registro1">
                                           <strong>FIRMA</strong>                                       
                                        </div>
                                        <div class="col-md-4 registro2">
                                            <strong>ACLARACION</strong>
                                        </div>
                                        <div class="col-md-4 registro3">
                                            <strong>N° Y TIPO DE DOCUMENTO</strong>
                                        </div>
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
    height: 20mm !important;
  }
  #celdas4{
    border: 1px solid #ccc;
    border-radius: 15px;
    margin: 5px;
    height: 195mm !important;
  }

  #celdas5{
    border: 1px solid #ccc;
    margin: 5px;
    height: 30mm !important;
    text-align: center;
  }

  .logo {
    margin-right: 2px;
    
  }
  .logo img{
    margin-top: 3%;
    margin-left: 30%;
    height: 35%;
    width: 55%;
  }
  .datos {
    background-color: black;
    font-size: 25px;
    padding: 0px !important;
    margin-top: 0% !important;
    margin-left: 5% !important;
    height: 65px !important;
    width: 5%;
    position: center top ;
   
  }
  .datos p {
    color: white;
    margin: 0 0 0px;
    position:absolute;
    top:5px;
    right:10px;

}
  .datos2 {
    font-size: 10px;
    padding: 0px !important;
    margin-top: 0% !important;
    text-align: left;
    margin-left: 3% !important;
  
  }

  .datos2 h5 p {
    margin: 0;
    padding: 0;
  
  }

  .datos3 {
    font-size: 10px;
    text-align: center;
    margin-top: 1% !important; 
  }

  .cliente1 {
    font-size: 12px;
    padding: 0px !important;
    margin-top: 1%;
  }
  .cliente1 p {
    margin-top: 2%;
    margin-left: 5%;
  }
  .cliente2 {
    font-size: 12px;
    padding: 0px !important;
    margin-top: 1%;
  }
  .cliente2 p {
    margin-top: 2%;
    margin-left: 5%;
  }

  #celdas4 h1{
    position:absolute;
    bottom:5px;
    right:10px;
  }

  .registrovacio1  {
    border: 1px solid #ccc;
    height: 25mm !important;
  }
  .registrovacio2  {
    border: 1px solid #ccc;
    height: 25mm !important;
  }
  .registrovacio3  {
    border: 1px solid #ccc;
    height: 25mm !important;
  }
  .registro1 {
    border: 1px solid #ccc;
    height: 5mm !important;
  }
  .registro2 {
    border: 1px solid #ccc;
    height: 5mm !important;
  }
  .registro3 {
    border: 1px solid #ccc;
    height: 5mm !important;
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
    height: 20mm !important;
  }
  #celdas4{
    border: 1px solid #ccc;
    border-radius: 15px;
    margin: 5px;
    height: 105mm !important;
  }

  #celdas5{
    border: 1px solid #ccc;
    margin: 5px;
    height: 30mm !important;
    text-align: center;
  }

  .logo {
    margin-right: 2px;
    
  }
  .logo img{
    margin-top: 3%;
    margin-left: 30%;
    height: 35%;
    width: 55%;
  }
  .datos {
    background-color: black !important;
    font-size: 25px;
    padding: 0px !important;
    margin-top: 0% !important;
    margin-left: 5% !important;
    height: 65px !important;
    width: 5%;
    position: center top ;
   
  }
  .datos p {
    color: white;
    margin: 0 0 0px;
    position:absolute;
    top:5px;
    right:10px;

}
.datos2 {
    font-size: 10px;
    padding: 0px !important;
    margin-top: 0% !important;
    text-align: left;
    margin-left: 3% !important;
  
  }

  .datos2 h5 p {
    margin: 0;
    padding: 0;
  
  }

  .datos3 {
    font-size: 10px;
    text-align: center;
    margin-top: 1% !important; 
  }

  .cliente1 {
    font-size: 12px;
    padding: 0px !important;
    margin-top: 1%;
  }
  .cliente1 p {
    margin-top: 2%;
    margin-left: 5%;
  }
  .cliente2 {
    font-size: 12px;
    padding: 0px !important;
    margin-top: 1%;
  }
  .cliente2 p {
    margin-top: 2%;
    margin-left: 5%;
  }

  #celdas4 h1{
    position:absolute;
    bottom:5px;
    right:10px;
  }

  .registrovacio1 {
    border: 1px solid #ccc;
    height: 25mm !important;
    width: 50mm !important; 
  }
  .registrovacio2 {
    border: 1px solid #ccc;
    height: 25mm !important;
    width: 50mm !important;
    margin-left: 50mm !important; 
    margin-top: -25mm !important;
    
  }
  .registrovacio3 {
    border: 1px solid #ccc;
    height: 25mm !important;
    width: 50mm !important;
    margin-left: 100mm !important; 
    margin-top: -25mm !important;
     
  }
  .registro1 {
    border: 1px solid #ccc;
    height: 5mm !important;
    width: 50mm !important; 
  }
  .registro2 {
    border: 1px solid #ccc;
    height: 5mm !important;
    width: 50mm !important; 
  }
  .registro3 {
    border: 1px solid #ccc;
    height: 5mm !important;
    width: 50mm !important; 
  
  }

  /* ... otros estilos para la impresión ... */
}
</style>

