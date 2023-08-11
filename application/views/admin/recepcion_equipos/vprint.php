<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
        <h1>
            Orden de Recepción de equipos

        </h1>
                                       
        </div>
    </section>
    <section class="content" id="cuerpo">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row" id="datos">
                    <div class="col-md-12">
                    <div class="invoice">
                        <div class="header">
                          <div class="logo">
                          <img src="<?php echo base_url()?>assets/template/dist/img/1200x600.jpg" width="100">
                          </div>
                          <div class="info">
                            <p>Elecctrónica BIOS</p>
                            <p>Cereseto Oeste 156</p>
                            <p>Capital San Juan</p>
                            <p>Teléfono: 264-4275852</p>
                            <p>Correo Electrónico: electronicabios@gmail.com</p>
                          </div>
                         
                        
                                    <div class="invoice-data">
                                        <h3>ORDEN RECEPCIÓN N°</h3>
                                            <h4><?php echo $equiposindex->num_orden; ?></h4>
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
                                    <p>Marca: <?php echo $equiposindex->marca; ?> </p>
                                    <p>Modelo: <?php echo $equiposindex->modelo; ?></p>
                                    <p>N° de Serie: <?php echo $equiposindex->num_serie; ?></p>
                                    <p>Sector: <?php echo $equiposindex->sector; ?></p>
                                </div>
                            </div>
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

<style>
  .invoice {
    width: 148mm; /* Ancho A5 */
    height: 210mm; /* Alto A5 */
    margin: auto;
    padding: 10px;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .header {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
  }
  .logo {
    margin-right: 10px;
    max-width: 30mm; /* Ancho del logo */
  }
  .info {
    font-size: 8px;
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
    display: flex;
    justify-content: space-between;
    margin-bottom: 5px;
  }
  .customer, .equipment {
    flex-basis: calc(50% - 5px);
    padding: 10px;
  }
  .customer h3, .equipment h3 {
    margin-top: 0;
  }
  .description {
    border: 1px solid #ccc;
    padding: 10px;
  }
  .description h3 {
    margin-top: 0;
  }
  .signatures {
    display: flex;
    justify-content: space-between;
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
</style>

