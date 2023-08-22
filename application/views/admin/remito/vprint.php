<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
            <h1>Remito</h1>                            
        </div>
    </section>
    <section class="content" id="cuerpo">
        <div class="box box-solid" style="margin-top: 1px;">
            <div class="box-body">
                <div class="col-sm-3 form-group" id="botones" style="margin-left: -85px;">
                                <a class="btn btn-info" style="margin-bottom: 10px; margin-rigth: 10px;" href="<?php echo base_url();?>mantenimiento/cequipos">Volver</a>
                                <button id="printButton" style="margin-bottom: 10px; margin-rigth: 10px;" class="btn btn-success">Imprimir</button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="invoice">
                            <div class="header">
                                <div class="logo">
                                    <img src="<?php echo base_url()?>assets/template/dist/img/logo presus.png" width="100">
                                </div>
                                <div class="info">
                                    <p>Elecctrónica BIOS</p>
                                    <p>Cereseto Oeste 156</p>
                                    <p>Capital San Juan</p>
                                    <p>Teléfono: 264-4275852</p>
                                    <p>Correo Electrónico: electronicabios@gmail.com</p>
                                </div>
                                <div class="invoice-data">
                                    <h2>REMITO</h2>
                                    <h4>N°<?php echo $remito->IdRemito; ?></h4>
                                    <h4>Fecha: <?php echo date("d/m/Y", strtotime("$remito->fecha")); ?></h4>
                                </div>
                            </div>   
                            <div class="divider"></div>
                            <div class="cliente">
                                <div class="info">
                                <p>Cliente:</p>
                                    <p><?php echo $cliente->Nombre; ?></p>
                                    <strong>Domicilio: </strong>
                                    <p><?php echo $cliente->Domicilio; ?></p>
                                    <strong>Localidad: </strong>
                                    <p><?php echo $cliente->Localidad; ?></p>  
                                </div>
                                <div class="invoice-data">
                                <strong>Provincia: </strong>
                                    <p><?php echo $cliente->Provincia; ?></p>
                                    <strong>Teléfono: </strong>
                                    <p><?php echo $cliente->Telefono1; ?></p>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="description">
                                <h3>Descripción de Avería:</h3>
                                <p><?php echo $remito->IdRemito; ?></p>  
                            </div>
                            <div class="signatures">
                                <div class="signature">
                                    <h3>Firma Cliente</h3>
                                    <br>
                                    <p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
                                </div>
                                <div class="signature">
                                    <h3>Firma Técnico</h3>
                                    <br>
                                    <p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
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
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .header {
    display: flex;
    align-items: center;
    margin-bottom: -53px;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: stretch;
    justify-content: space-around;
}
  .logo {
    margin-right: 10px;
    max-width: 30mm; /* Ancho del logo */
  }
  .info {
    font-size: 10px;
  }
  .info p {
    margin: 0 0 0px;
}
  .divider {
    border-top: 1px solid #ccc;
    margin: 3px 0;
  }
  .invoice-data {
    text-align: right;
    font-size: 8px;
  }

  .cliente{
    display: flex;
    align-items: left !important;
    margin-top: -56px !important;
    margin-bottom: -53px;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: stretch;
    justify-content: space-around;

  }

  .info2 {
    font-size: 12px;
  }
  .info2 p {
    margin: 0 0 0px;
}
  /*
  .customer-equipment {
    justify-content: space-between;
    margin-top: -106px;
    margin-bottom: -115px;
  }
  .customer, .equipment {
    flex-basis: calc(50% - 5px);
    padding: 5px;
  }
  .customer h3, .equipment h3 {
    margin-top: 0;
  }
  .description {
    
    padding: 5px;
    margin-top: -114px;
  }
  .description h3 {
    margin-top: 0;
  }
  .signatures {
    display: flex;
    margin-top: 10px;
  }
  .signature {
    flex-basis: calc(50% - 5px);
    border-top: 1px solid #ccc;
    padding-top: 10px;
  }
  .signature h3 {
    margin-top: 0;
  }
  .signature p {
    margin-bottom: 5px;
  }
  */

  @media print {
  body {
    margin: 0;
    display: flex;
    flex-direction: column;
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
