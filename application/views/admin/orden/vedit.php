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
                            <div class="col-sm-2 form-group">
                                <label for="fecha">FECHA</label>
                                <input type="date" id="txtfecha" name="txtfecha"  value="<?php echo !empty(form_error('txtfecha'))? set_value('txtfecha') : $ordenedit->FechaRecepcion ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="tarea">Tarea</label>
                                <input type="text" id="txttarea" name="txttarea" maxlength="50" value="<?php echo !empty(form_error('txttarea'))? set_value('txttarea') : $ordenedit->TareaDesarrollar ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
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
