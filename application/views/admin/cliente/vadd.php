<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cliente
            <small>Nuevo</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger">
                                    <p><?php echo $this->session->flashdata('error') ?></p>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo base_url(); ?>mantenimiento/ccliente/cinsert" method="POST">
                                <div class="col-sm-2 form-group">
                                  <label for="cuit">CUIT</label>
                                  <input type="number" id="txtcuit" name="txtcuit" min="1"  class="form-control" value="<?php echo set_value('txtcuit') ?>" required >
                                </div>
                                <div class=" col-sm-6 form-group">
                                    <label for="iva">I.V.A</label>
                                    <input type="text" id="txtiva" name="txtiva" class="form-control" value="<?php echo set_value('txtiva') ?>"  >
                                </div>
                                <div class=" col-sm-6 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="txtnombre" name="txtnombre" maxlength="256"class="form-control" value="<?php echo set_value('txtnombre') ?>"  required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="domicilio">Domicilio</label>
                                    <input type="text" id="txtdomicilio" name="txtdomicilio"maxlength="1000" class="form-control" value="<?php echo set_value('txtdomicilio') ?>"  >
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="provincia">Provincia</label>
                                    <input type="text" id="txtprovincia" name="txtprovincia" maxlength="50"class="form-control" value="<?php echo set_value('txtprovincia') ?>"  >
                                </div>
                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-success" href="<?php echo base_url(); ?>mantenimiento/ccliente">Volver</a>
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
