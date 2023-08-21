<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
            <h1>
                Remito
            </h1>
        </div>
    </section>
    <section class="content" id="cuerpo">
        <div class="box box-solid" style="margin-top: 1px;">
            <div class="box-body">
                <div class="col-sm-3 form-group" id="botones" style="margin-left: -85px;">
                    <a class="btn btn-info" style="margin-bottom: 10px; margin-rigth: 10px;" href="<?php echo base_url(); ?>mantenimiento/cequipos">Volver</a>
                    <button id="printButton" style="margin-bottom: 10px; margin-rigth: 10px;" class="btn btn-success">Imprimir</button>
                </div>
                <div class="row" id="datos">
                    <div class="col-md-12">
                        <div class="invoice">
                            <div class="col-md-2">
                                <div class="header1">
                                    <div class="logo">
                                        <img src="<?php echo base_url() ?>assets/template/dist/img/logo presus.png" width="100">
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
                                        <h4>N°<?php echo $remito->IdRemito; ?></h4>
                                        <h4>Fecha: <?php echo date("d/m/Y", strtotime("$remito->fecha")); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="header2">
                                    <div class="invoice-data">
                                        <h3>ORDEN RECEPCIÓN</h3>
                                        <h4>N°<?php echo $remito->IdRemito; ?></h4>
                                        <h4>Fecha: <?php echo date("d/m/Y", strtotime("$remito->fecha")); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="customer-equipment">
                                <div class="customer">
                                    <h3>Datos del Cliente</h3>
                                    <p>Cliente: <?php echo $cliente->Nombre; ?></p>
                                    <p>Domicilio: <?php echo $cliente->Domicilio . " " . $cliente->Localidad . " " . $cliente->Provincia; ?></p>
                                    <p>Teléfono: <?php echo $cliente->Telefono1; ?></p>
                                    <p>Correo Electrónico: </p>
                                </div>
                                <div class="equipment">
                                    <h3>Datos del equipo</h3>
                                    <p>Marca: <?php echo $remito->IdRemito; ?> </p>
                                    <p>Modelo: <?php echo $remito->IdRemito; ?></p>
                                    <p>N° de Serie: <?php echo $remito->IdRemito; ?></p>
                                    <p>Sector: <?php echo $remito->IdRemito; ?></p>
                                    <p>Accesorios: <?php echo $remito->IdRemito; ?></p>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="description">
                                <h3>Descripción de Avería:</h3>
                                <p><?php echo $remito->IdRemito; ?></p>
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
        width: 148mm;
        /* Ancho A5 */
        height: 210mm;
        /* Alto A5 */
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
        max-width: 30mm;
        /* Ancho del logo */
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
        margin-bottom: -115px;
    }

    .customer,
    .equipment {
        flex-basis: calc(50% - 5px);
        padding: 5px;
    }

    .customer h3,
    .equipment h3 {
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

        .box box-solid {
            display: none;
        }

        #botones {
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