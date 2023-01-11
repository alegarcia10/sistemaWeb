<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Roles
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
                        <form action="<?php echo base_url();?>mantenimiento/croles/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $rolesedit->idRol ?>" name="txtidusuario" id="txtidusuario">
                            <div class=" col-sm-12 form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" maxlength="256" value="<?php echo !empty(form_error('txtnombre'))? set_value('txtnombre') : $rolesedit->nombre_tipo ?>" class= "form-control" required >
                            </div>    
                            <div class="col-sm-4  form-group">
                                <label for="rol">Privilegios</label>
                            <div class="col-md-4 form-group">
                                <label>Cliente</label><br>
                                <input class="chk_input" type="checkbox" id="cliente" name="cliente" data-width="20" data-height="20" <?=(!empty($rolesedit->cliente)&&$rolesedit->cliente=="1")?'checked':''?> <?=(!empty($consultar)) ? "disabled" : "";?> <?=(!isset($rolesedit->cliente))?'checked':''?> />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Tecnico</label><br>
                                <input class="chk_input" type="checkbox" id="tecnico" name="tecnico" data-width="20" data-height="20" <?=(!empty($rolesedit->tecnico)&&$rolesedit->tecnico=="1")?'checked':''?> <?=(!empty($consultar)) ? "disabled" : "";?> <?=(!isset($rolesedit->tecnico))?'checked':''?> />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Ordenes</label><br>
                                <input class="chk_input" type="checkbox" id="ordenes" name="ordenes" data-width="20" data-height="20" <?=(!empty($rolesedit->ordenes)&&$rolesedit->ordenes=="1")?'checked':''?> <?=(!empty($consultar)) ? "disabled" : "";?> <?=(!isset($rolesedit->ordenes))?'checked':''?> />
                                <span class="checkmark"></span>
                            </div>
                            </div>
                            <div class="col-sm-12 form-group">
                            <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/croles">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
