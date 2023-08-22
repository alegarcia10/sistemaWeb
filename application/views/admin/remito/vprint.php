<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
            <h1>Remito</h1>                            
        </div>
    </section>
    <section class="content" id="cuerpo">
        <div class="box solid" style="margin-top: 1px;">
            <div class="body">
                <div class="col-sm-3 form-group" id="botones" style="margin-left: -85px;">
                                <a class="btn btn-info" style="margin-bottom: 10px; margin-rigth: 10px;" href="<?php echo base_url();?>mantenimiento/cremitos">Volver</a>
                                <button id="printButton" style="margin-bottom: 10px; margin-rigth: 10px;" class="btn btn-success">Imprimir</button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="invoice">
                            <div class="row">
                                <div class="col-md-8" id="celdas">
                                    
                                </div>
                                <div class="col-md-3" id="celdas">
                                    
                                </div>
                                <div class="col-md-12" id="celdas">
                                    
                                </div>
                                <div class="col-md-12" id="celdas">
                                    
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
  .invoice {
    width: 148mm; /* Ancho A5 */
    height: 210mm; /* Alto A5 */
    margin: auto;
    padding: 5px;
    border: 1px solid #ccc;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }

  #celdas{
    border-style: solid;
    margin: 5px;
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

  .invoice {
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

