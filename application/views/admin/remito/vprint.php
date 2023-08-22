<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
                           <h2>Remito</h2>    
        </div>
    </section>
    <section class="content" >
        <div class="box solid" style="margin-top: 35 px;">
            <div class="body">
                <div class="col-sm-3 form-group" id="botones" style="margin-left: -85px;" style="margin-top: 35 px;">
                                <a class="btn btn-info" style="margin-bottom: 10px; margin-rigth: 10px;" href="<?php echo base_url();?>mantenimiento/cremitos">Volver</a>
                                <button id="printButton" style="margin-bottom: 10px; margin-rigth: 10px;" class="btn btn-success">Imprimir</button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="cuerpo">
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
                                            <h4>N°<?php echo $remito->IdRemito; ?></h4>
                                            <h4>Fecha: <?php echo date("d/m/Y", strtotime("$remito->fecha")); ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="celdas3">
                                    
                                </div>
                                <div class="col-md-12" id="celdas4">
                                    
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
    width: 148mm; /* Ancho A5 */
    height: 210mm; /* Alto A5 */
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
    height: 30mm !important;
  }
  #celdas4{
    border: 1px solid #ccc;
    border-radius: 15px;
    margin: 5px;
    height: 130mm !important;
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
    border: 1px solid #ccc;
    padding: 0px !important;
    margin-top: 3mm;
  }
  .datos p {
    margin: 0 0 0px;

}
.datos2 {
    font-size: 10px;
    border: 1px solid #ccc;
    padding: 0px !important;
    margin-top: -2mm;
    text-align: right;
  }
  

  @media print {
  body {
    margin: 0;
    justify-content: space-between;
    padding: 0;
    font-family: Arial, sans-serif;
    font-size: 10px;
  }

  .main-footer {
    display: none;
  }

  .box box-solid{
    display: none;
  }

  #botones{
    display: none;
  }

  .cuerpo {
    width: 148mm;
    height: 208mm;
    margin: 0;
    padding: 10px;
    border: 1px solid #ccc;
    box-shadow: none;
  }

  /* ... otros estilos para la impresión ... */
}
</style>

