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
                       <?php if($this->session->flashdata('error')):?>
                        <div class="alert alert-danger">
                            <p><?php echo $this->session->flashdata('error') ?> </p>
                        </div>
                        <?php endif ; ?>
                        <form action="<?php echo base_url();?>mantenimiento/corden/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $ordenedit->IdOrden ?>" name="txtidorden" id="txtidorden">
                            <div class="col-sm-3 form-group">
                                <label for="fecha">FECHA</label>
                                <input type="text" id="txtfecha" name="txtfecha"  min="2020-01-01" max="2100-12-31" value="<?php echo !empty(form_error('txtfecha'))? set_value('txtfecha') :  date("d-m-Y", strtotime("$ordenedit->FechaRecepcion"));?>" class= "form-control"   disabled>
                            </div>
                            <div class="col-sm-3 form-group">
                                <label for="precio">PRECIO</label>
                                <input type="number" id="txtprecio" name="txtprecio" data-decimal="2" oninput="enforceNumberValidation(this)" value="<?php echo !empty(form_error('txtprecio'))? set_value('txtprecio') :  $ordenedit->Precio;?>" class= "form-control"   >
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Completa</label><br>
                                <input class="chk_input" type="checkbox" id="habilitado" name="habilitado" data-width="20" data-height="20" <?=(!empty($ordenedit->Completada)&&$ordenedit->Completada=="1")?'checked':''?> <?=(!empty($consultar)) ? "disabled" : "";?> <?=(!isset($ordenedit->Completada))?'checked':''?> />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="tarea">Tarea</label>
                                <input type="text" id="txttarea" name="txttarea" maxlength="50" value="<?php echo !empty(form_error('txttarea'))? set_value('txttarea') : $ordenedit->TareaDesarrollar ?>" class= "form-control"  required>
                            </div>
                            <div class="col-md-5 form-group">
                              <label for="cliente">Cliente&nbsp;&nbsp; (*)</label>
                							<? $this->select_items->sin_buscador2($cliente_select,(!empty($model->IdCliente))
                               ? $model->IdCliente : '',	'cliente','1',(!empty($consultar)) ? "disabled ":'required');?>
                							<input id="cliente_hidden" name="cliente_hidden" type="hidden" >
                						</div>
                            <div class="col-sm-12 form-group">
                            <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/corden">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
<script>
	function enforceNumberValidation(ele) {
    if ($(ele).data('decimal') != null) {
        // found valid rule for decimal
        var decimal = parseInt($(ele).data('decimal')) || 0;
        var val = $(ele).val();
        if (decimal > 0) {
            var splitVal = val.split('.');
            if (splitVal.length == 2 && splitVal[1].length > decimal) {
                // user entered invalid input
                $(ele).val(splitVal[0] + '.' + splitVal[1].substr(0, decimal));
            }
        } else if (decimal == 0) {
            // do not allow decimal place
            var splitVal = val.split('.');
            if (splitVal.length > 1) {
                // user entered invalid input
                $(ele).val(splitVal[0]); // always trim everything after '.'
            }
        }
    }
}
</script>
