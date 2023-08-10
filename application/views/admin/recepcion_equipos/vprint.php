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
                                    <img src="<?php echo base_url()?>assets/template/dist/img/1200x600.jpg" width="150">
                                        
                                    </div>
                                    <div class="info">
                                        <p>Elecctrónica BIOS</p>
                                        <p>Cereseto Oeste 156</p>
                                        <p>Capital San Juan</p>
                                        <p>Teléfono: 264-4275852</p>
                                        <p>Correo Electrónico: electronicabios@gmail.com</p>
                                    </div>
                                 </div>
                                <div class="divider"></div>
                                    <div class="invoice-data">
                                        <h2>ORDEN RECEPCIÓN N°</h2>
                                            <h3><?php echo $equiposindex->num_orden; ?></h3>
                                            <h3>Fecha: <?php echo date("d/m/Y", strtotime("$equiposindex->fecha")); ?></h3>
                                    </div>
                                </div>
                            <div class="customer-equipment">
                                <div class="customer">
                                    <h2>Datos del Cliente</h2>
                                    <p>Cliente: </p>
                                    <p>Domicilio: </p>
                                    <p>Teléfono: </p>
                                    <p>Correo Electrónico: </p>
                                </div>
                                <div class="equipment">
                                    <h2>Datos del equipo</h2>
                                    <p>Marca: <?php echo $equiposindex->marca; ?> </p>
                                    <p>Modelo: <?php echo $equiposindex->modelo; ?></p>
                                    <p>N° de Serie: <?php echo $equiposindex->num_serie; ?></p>
                                    <p>Sector: <?php echo $equiposindex->sector; ?></p>
                                </div>
                            </div>
                            <div class="description">
                                <h2>Descripción de Avería:</h2>
                                
                                <p><?php echo $equiposindex->descripcion; ?></p>
                                
                                
                            </div>
                            <div class="signatures">
                            <div class="signature">
                                <h2>Firma Cliente</h2>
                                    <hr>
                                    <p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
                                </div>
                                <div class="signature">
                                    <h2>Firma Técnico</h2>
                                    <hr>
                                    <p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
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
    
    margin: auto;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
  }
  .header {
    display: flex;
    align-items: center;
    flex: 1;
  }
  .logo {
    margin-right: 20px;
    max-width: 150px;
  }
  .info {
    font-size: 14px;
  }
  .info p {
    margin-bottom: 1px;
  }
  .divider {
    border-left: 1px solid #ccc;
    margin: 0 20px;
    height: 100%;
  }
  .invoice-data {
    flex: 1;
    text-align: right;
    font-size: 14px;
  }
  .customer-equipment {
    flex-basis: 100%;
    display: flex;
    justify-content: space-between;
  }
  .customer, .equipment {
    flex-basis: calc(50% - 10px);
    border: 1px solid #ccc;
    padding: 20px;
  }
  .customer h2, .equipment h2 {
    margin-top: 0;
  }
  .description {
    flex-basis: 100%;
    border: 1px solid #ccc;
    padding: 20px;
  }
  .description h2 {
    margin-top: 0;
  }
  .lines {
    margin-top: 10px;
    border-top: 1px dotted #ccc;
    padding-top: 10px;
  }
  .signatures {
    flex-basis: 100%;
    display: flex;
    justify-content: space-between;
  }
  .signature {
    flex-basis: 50%;
    margin-top: 20px;
    border-top: 1px solid #ccc;
    padding-top: 20px;
  }
  .signature h2 {
    margin-top: 0;
  }
  .signature p {
    margin-bottom: 10px;
  }
</style>

