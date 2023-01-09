<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Roles
            <small>Nuevo</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="row">
                        <?php if ($this->session->flashdata('error')):?>
                            <div class="alert alert-danger">
                                <p><?php echo $this->session->flashdata('error')?></p>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo base_url();?>mantenimiento/croles/cinsert" method="POST">
                        <div class=" col-sm-4 form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" class="form-control" value="<?php echo set_value('txtnombre') ?>"   required>
                            </div>    
                            
                        <div class="col-sm-12 form-group">
                                <label for="tipo_usuario">Vistas permitidas</label><br>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Cliente</label>
                                    <input class="chk_input" type="checkbox" id="habilitado" name="habilitado" data-width="20" data-height="20" <?=(!empty($ordenedit->Completada)&&$ordenedit->Completada=="1")?'checked':''?> <?=(!empty($consultar)) ? "disabled" : "";?> <?=(!isset($ordenedit->Completada))?'checked':''?> />
                                    <span class="checkmark"></span>
                                </div>
                                <div class="col-md-12 form-group">
                                <label>Técnicos</label>
                                <input class="chk_input" type="checkbox" id="habilitado" name="habilitado" data-width="20" data-height="20" <?=(!empty($ordenedit->Completada)&&$ordenedit->Completada=="1")?'checked':''?> <?=(!empty($consultar)) ? "disabled" : "";?> <?=(!isset($ordenedit->Completada))?'checked':''?> />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Ordenes</label>
                                <input class="chk_input" type="checkbox" id="habilitado" name="habilitado" data-width="20" data-height="20" <?=(!empty($ordenedit->Completada)&&$ordenedit->Completada=="1")?'checked':''?> <?=(!empty($consultar)) ? "disabled" : "";?> <?=(!isset($ordenedit->Completada))?'checked':''?> />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Usuarios</label>
                                <input class="chk_input" type="checkbox" id="habilitado" name="habilitado" data-width="20" data-height="20" <?=(!empty($ordenedit->Completada)&&$ordenedit->Completada=="1")?'checked':''?> <?=(!empty($consultar)) ? "disabled" : "";?> <?=(!isset($ordenedit->Completada))?'checked':''?> />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Roles</label>
                                <input class="chk_input" type="checkbox" id="habilitado" name="habilitado" data-width="20" data-height="20" <?=(!empty($ordenedit->Completada)&&$ordenedit->Completada=="1")?'checked':''?> <?=(!empty($consultar)) ? "disabled" : "";?> <?=(!isset($ordenedit->Completada))?'checked':''?> />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-sm-12 form-group">
                            <a class="btn btn-default" href="<?php echo base_url();?>mantenimiento/croles">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
