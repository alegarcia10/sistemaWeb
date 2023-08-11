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
        <img src="tu_logo.png" alt="Logo de la Empresa">
      </div>
      <div class="info">
        <p>Nombre de la Empresa</p>
        <p>Dirección de la Empresa</p>
        <p>Teléfono: XXX-XXX-XXXX</p>
        <p>Correo Electrónico: info@empresa.com</p>
        <p>Número de Identificación Fiscal: XXXXXXXXX</p>
      </div>
      <div class="invoice-data">
      <h3>Orden N°</h3>
      <p>Número de Factura: 12345</p>
      <p>Fecha de Emisión: 08 de Agosto de 2023</p>
     
    </div>
    </div>
    <div class="divider"></div>
    
    <div class="customer-equipment">
      <div class="customer">
        <h3>Datos del Cliente</h3>
        <p>Nombre del Cliente: Juan Pérez</p>
        <p>Dirección del Cliente: Calle 123, Ciudad</p>
        <p>Teléfono: XXX-XXX-XXXX</p>
        <p>Correo Electrónico: juan@example.com</p>
      </div>
      <div class="equipment">
        <h2>Datos del equipo</h2>
        <p>Marca: </p>
        <p>Modelo: </p>
        <p>N° de Serie: </p>
        <p>Sector: </p>
      </div>
    </div>
    <div class="description">
      <h2>Descripción de Avería</h2>
      <div class="lines">
        <p>____________________________________</p>
        <p>____________________________________</p>
        <p>____________________________________</p>
      </div>
    </div>
    <div class="signatures">
      <div class="signature">
        <h2>Firma Técnico</h2>
        <p>____________________</p>
      </div>
      <div class="signature">
        <h2>Firma Cliente</h2>
        <p>____________________</p>
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
    margin: 10px 0;
  }
  .invoice-data {
    text-align: right;
    font-size: 8px;
  }
  .customer-equipment {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
  }
  .customer, .equipment {
    flex-basis: calc(50% - 5px);
    padding: 10px;
  }
  .customer h2, .equipment h2 {
    margin-top: 0;
  }
  .description {
    border: 1px solid #ccc;
    padding: 10px;
  }
  .description h2 {
    margin-top: 0;
  }
  .lines {
    margin-top: 5px;
    border-top: 1px dotted #ccc;
    padding-top: 5px;
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
  .signature h2 {
    margin-top: 0;
  }
  .signature p {
    margin-bottom: 5px;
  }
</style>

