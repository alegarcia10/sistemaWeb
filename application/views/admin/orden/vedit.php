<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Orden
            <small>Editar</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
               <hr>
               <div class="row">
                   <div class="col-md-12">
                       <?php var_dump($facturas); die; if($this->session->flashdata('error')):?>
                        <div class="alert alert-danger">
                            <p><?php echo $this->session->flashdata('error') ?> </p>
                        </div>
                        <?php endif ; ?>
                        <form action="<?php echo base_url();?>mantenimiento/corden/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $ordenedit->IdOrden ?>" name="txtidorden" id="txtidorden">
                            <div class="col-sm-3 form-group">
                                <label for="fecha">Fecha de Recepción</label>
                                <input type="text" id="txtfecha" name="txtfecha"  min="2020-01-01" max="2100-12-31" value="<?php echo !empty(form_error('txtfecha'))? set_value('txtfecha') :  date("d-m-Y", strtotime("$ordenedit->FechaRecepcion"));?>" class= "form-control"   >
                            </div>
                            <div class="col-sm-3 form-group">
                                <label for="precio">Precio</label>
                                <input type="number" id="txtprecio" name="txtprecio" step="0.01"  value="<?php echo !empty(form_error('txtprecio'))? set_value('txtprecio') :  $ordenedit->Precio;?>" class= "form-control"   >
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Completa</label><br>
                                <input class="chk_input" type="checkbox" id="habilitado" name="habilitado" data-width="20" data-height="20" <?=(!empty($ordenedit->Completada)&&$ordenedit->Completada=="1")?'checked':''?> <?=(!empty($consultar)) ? "disabled" : "";?> <?=(!isset($ordenedit->Completada))?'checked':''?> />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="tarea">Tarea</label>
                                <input type="text" id="txttarea" name="txttarea"  maxlength="1000" value="<?php echo !empty(form_error('txttarea'))? set_value('txttarea') : $ordenedit->TareaDesarrollar ?>" class= "form-control"  required>
                            </div>
                            <div class="col-md-5 form-group">
                              <label for="cliente">Cliente&nbsp;&nbsp; (*)</label>
                							<? $this->select_items->sin_buscador2($cliente_select,(!empty($model->IdCliente))
                               ? $model->IdCliente : '',	'cliente','1',(!empty($consultar)) ? "disabled ":'required');?>
                			<input id="cliente_hidden" name="cliente_hidden" type="hidden" >
                			</div>
                            <div class=" col-sm-12 form-group">
                                <label for="obser">OBSERVACIONES</label>
                                <input type="text" id="txtobser" name="txtobser" maxlength="1000"class="form-control" value="<?php echo !empty(form_error('txtobser'))? set_value('txtobser') : $ordenedit->observaciones ?>" class= "form-control">
                            </div>
                            <br>
                            <br>    
                            <div class=" col-sm-12 form-group">
                                <h2>Datos de Facturacion</h2>
                            </div>
                            <div class="col-sm-3 form-group">
                                <label for="numFactura">N° Factura</label>
                                <input type="text" id="txtnumFactura" name="txtnumFactura" class= "form-control" value="<?php echo !empty(form_error('txtnumFactura'))? set_value('txtnumFactura') :  $facturas->N_factura;?>" class= "form-control" >
                            </div>
                            <div class="col-sm-3 form-group">
                                <label for="fechaFactura">Fecha Factura</label>
                                <input type="text" id="txtfechaFactura" name="txtfechaFactura" class="form-control"  value="<?php echo !empty(form_error('txtfechaFactura'))? set_value('txtfechaFactura') :  date("d-m-Y", strtotime("$facturas->fecha_factura"));?>" >
                            </div>
                            <div class="col-sm-3 form-group">
                                <label for="fechaPago">Fecha Pago</label>
                                <input type="text" id="txtfechaPago" name="txtfechaPago" class="form-control"  value="<?php echo !empty(form_error('txtfechaPago'))? set_value('txtfechaPago') :  date("d-m-Y", strtotime("$facturas->fecha_pago"));?>">
                            </div>
                            <div class="col-sm-3 form-group">
                                <label for="Pago">Estado del Pago</label>
                                <input type="text" id="txtpago" name="txtpago" maxlength="1000" value="<?php echo !empty(form_error('txtpago'))? set_value('txtpago') : $facturas->estado_pago ?>" class= "form-control">    
                            </div>
                            <br>
                            <br>

                            <div class="col-sm-12 form-group">
                                <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/corden">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div> 
               </div>
            </div>
        </div>
    </section>
</div>

<style>
    input[type="radio"], input[type="checkbox"] {
    
    margin-left: 20px;
    
}
    </style>

<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>
