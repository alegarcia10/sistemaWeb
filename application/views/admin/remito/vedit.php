<div class="content-wrapper">
    <section class="content-header">
        <h1>
        remito<?php echo $remitoedit->IdRemito ?>
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
                        <form action="<?php echo base_url();?>mantenimiento/cremitos/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $remitoedit->IdRemito?>" name="txtIdRemito" id="txtIdRemito">
                            <div class="col-md-5 form-group">
                              <label for="cliente">Cliente&nbsp;&nbsp; (*)</label>
                							<? $this->select_items->sin_buscador2($cliente_select,(!empty($model->IdCliente))
                               ? $model->IdCliente : '',	'cliente','1',(!empty($consultar)) ? "disabled ":'required');?>
                			<input id="cliente_hidden" name="cliente_hidden" type="hidden" >
                			</div>
                            <div class="col-sm-3 form-group">
                                <label for="fecha">Fecha de Recepción</label>
                                <input type="text" id="txtfecha" name="txtfecha"  min="2020-01-01" max="2100-12-31" value="<?php echo !empty(form_error('txtfecha'))? set_value('txtfecha') :  date("d-m-Y", strtotime("$ordenedit->fecha"));?>" class= "form-control"   >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="vendedor">VENDEDOR</label>
                                <input type="text" id="txtvendedor" name="txtvendedor" maxlength="256" value="<?php echo !empty(form_error('txtvendedor'))? set_value('txtvendedor') : $remitoedit->vendedor ?>" class= "form-control" required >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="observaciones">OBSERVACIONES</label>
                                <input type="text" id="txtobservaciones" name="txtobservaciones" maxlength="1000" value="<?php echo !empty(form_error('txtobservaciones'))? set_value('txtobservaciones') : $remitoedit->observaciones ?>" class= "form-control"  >
                            </div>
                        
                            <div class="col-sm-6 form-group">
                                <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/cremitos">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
