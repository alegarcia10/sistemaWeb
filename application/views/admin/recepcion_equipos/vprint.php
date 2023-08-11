<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
        <h1>
            Orden de Recepción de equipos
            
        </h1>
                                       
        </div>
    </section>
    <section class="content" id="cuerpo">
        <div class="box box-solid" style="margin-top: 1px;">
            <div class="box-body">
                <div class="row" id="datos">
                    <div class="col-md-12">
                    <div class="col-sm-3 form-group">
                                <a class="btn btn-info" href="<?php echo base_url();?>mantenimiento/cequipos">Volver</a>
                                <button id="printButton" class="btn btn-success">Imprimir Orden</button>
                            </div>
                    
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
                                        <h3>ORDEN RECEPCIÓN</h3>
                                            <h4>N°<?php echo $equiposindex->num_orden; ?></h4>
                                            <h4>Fecha: <?php echo date("d/m/Y", strtotime("$equiposindex->fecha")); ?></h4>
                                    </div>
                                </div>
                                
                        <div class="divider"></div>
                        
                        <div class="customer-equipment">
                          <div class="customer">
                          <h3>Datos del Cliente</h3>
                                    <p>Cliente: <?php echo $model->Nombre; ?></p>
                                    <p>Domicilio: <?php echo $model->Domicilio." ".$model->Localidad." ".$model->Provincia; ?></p>
                                    <p>Teléfono: <?php echo $model->Telefono1; ?></p>
                                    <p>Correo Electrónico: </p>
                                </div>
                                <div class="equipment">
                                    <h3>Datos del equipo</h3>
                                    <p>Marca: <?php echo $equiposindex->marca;?> </p>
                                    <p>Modelo: <?php echo $equiposindex->modelo; ?></p>
                                    <p>N° de Serie: <?php echo $equiposindex->num_serie; ?></p>
                                    <p>Sector: <?php echo $equiposindex->sector; ?></p>
                                    <p>Accesorios: <?php echo $equiposindex->accesorios; ?></p>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="description">
                                <h3>Descripción de Avería:</h3>
                                
                                <p><?php echo $equiposindex->descripcion; ?></p>
                                
                                
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
    margin-bottom: -93px;
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
  .customer-equipment {
    justify-content: space-between;
    margin-top: -106px;
    margin-bottom: -119px;
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
    margin-top: -117px;
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

  .btn btn-info{
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

