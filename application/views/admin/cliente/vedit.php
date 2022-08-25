<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Cliente
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
                        <form action="<?php echo base_url();?>mantenimiento/ccliente/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $clienteedit->IdCliente ?>" name="txtidcliente" id="txtidcliente">
                            <input type="hidden" value="<?php echo $clienteedit->DniCuit ?>" name="txtcuitold" id="txtcuitold">
                            <div class="col-sm-2 form-group">
                                <label for="txtcuitnew">CUIT</label>
                                <input type="number" id="txtcuitnew" name="txtcuitnew" maxlength="999999999999" value="<?php echo !empty(form_error('txtcuitnew'))? set_value('txtcuitnew') : $clienteedit->DniCuit ?>" class= "form-control" required >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" maxlength="256" value="<?php echo !empty(form_error('txtnombre'))? set_value('txtnombre') : $clienteedit->Nombre ?>" class= "form-control" required >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="domicilio">Domicilio</label>
                                <input type="text" id="txtdomicilio" name="txtdomicilio" maxlength="1000" value="<?php echo !empty(form_error('txtdomicilio'))? set_value('txtdomicilio') : $clienteedit->Domicilio ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="provincia">Provincia</label>
                                <input type="text" id="txtprovincia" name="txtprovincia" maxlength="50"value="<?php echo !empty(form_error('txtprovincia'))? set_value('txtprovincia') : $clienteedit->Provincia ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-6 form-group">
                                <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/ccliente">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
