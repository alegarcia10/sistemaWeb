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
                            <input type="hidden" value="<?php echo $rolesedit->nombre_tipo ?>" name="txtnombreviejo" id="txtnombreviejo">
                            <div class="col-sm-4  form-group">
                                <label for="rol">Privilegios</label>
                                <? $this->select_items->sin_buscador2($roles_select,(!empty($model->idRol))
                               ? $model->idRol : '',	'rol','1',(!empty($consultar)) ? "disabled ":'required');?>
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
