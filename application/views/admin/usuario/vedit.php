<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Usuarios
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
                        <form action="<?php echo base_url();?>mantenimiento/cusuario/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $usuarioedit->idUsuario ?>" name="txtidusuario" id="txtidusuario">
                            <input type="hidden" value="<?php echo $usuarioedit->usuario ?>" name="txtnombreviejo" id="txtnombreviejo">
                            <div class=" col-sm-4 form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" value="<?php echo !empty(form_error('txtnombre'))? set_value('txtnombre') : $usuarioedit->nombre ?>" class= "form-control"  required>
                            </div>
                            <div class=" col-sm-4 form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" id="txtapellido" name="txtapellido" value="<?php echo !empty(form_error('txtapellido'))? set_value('txtapellido') : $usuarioedit->apellido ?>" class= "form-control"  >
                            </div>

                            <div class="col-sm-4  form-group">
                                <label for="usuario">usuario</label>
                                <input type="text" id="txtusuario" name="txtusuario" value="<?php echo !empty(form_error('txtusuario'))? set_value('txtusuario') : $usuarioedit->usuario ?>" class= "form-control" required>
                            </div>
                            <div class="col-sm-4  form-group">
                                <label for="Contraseña">Contraseña</label>
                                <input type="text" id="txtContraseña" name="txtContraseña" value="<?php echo !empty(form_error('txtContraseña'))? set_value('txtContraseña') : $usuarioedit->pass ?>" class= "form-control" required >
                            </div>

                            <div class="col-sm-12 form-group">
                            <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/cusuario">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
