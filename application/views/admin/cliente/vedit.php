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
                            <div class="col-sm-5 form-group">
                                <label for="iva">I.V.A</label>
                                <input type="text" id="txtiva" name="txtiva" maxlength="100" value="<?php echo !empty(form_error('txtiva'))? set_value('txtiva') : $clienteedit->IVA ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-5 form-group">
                                <label for="localidad">Localidad</label>
                                <input type="text" id="txtlocalidad" name="txtlocalidad" maxlength="100" value="<?php echo !empty(form_error('txtlocalidad'))? set_value('txtlocalidad') : $clienteedit->Localidad ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="domicilio">Domicilio</label>
                                <input type="text" id="txtdomicilio" name="txtdomicilio" maxlength="1000" value="<?php echo !empty(form_error('txtdomicilio'))? set_value('txtdomicilio') : $clienteedit->Domicilio ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="provincia">Provincia</label>
                                <input type="text" id="txtprovincia" name="txtprovincia" maxlength="50"value="<?php echo !empty(form_error('txtprovincia'))? set_value('txtprovincia') : $clienteedit->Provincia ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="mant">Tel Mantenimiento</label>
                                <input type="number" id="txtmant" name="txtmant" min="1"value="<?php echo !empty(form_error('txtmant'))? set_value('txtmant') : $clienteedit->tel_mantenimiento ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="ventas">Tel Ventas</label>
                                <input type="number" id="txtventa" name="txtventas" min="1"value="<?php echo !empty(form_error('txtventas'))? set_value('txtventas') : $clienteedit->tel_venta ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="comercial">Tel Comercial</label>
                                <input type="number" id="txtcomercial" name="txtcomercial" min="1"value="<?php echo !empty(form_error('txtcomercial'))? set_value('txtcomercial') : $clienteedit->tel_comercial ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="correo">Mail Mantenimiento</label>
                                <input type="text" id="txtmmant" name="txtmmant" min="1"value="<?php echo !empty(form_error('txtmmant'))? set_value('txtmmant') : $clienteedit->mail_mant ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="correo">Mail Ventas</label>
                                <input type="text" id="txtmvta" name="txtmvta" min="1"value="<?php echo !empty(form_error('txtmvta'))? set_value('txtmvta') : $clienteedit->mail_vta ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="correo">Mail Comercial</label>
                                <input type="text" id="txtmcial" name="txtmcial" min="1"value="<?php echo !empty(form_error('txtmcial'))? set_value('txtmcial') : $clienteedit->mail_comercial ?>" class= "form-control"  >
                            </div>
                            <div class="col-sm-12 form-group">
                                <a class="btn btn-info" href="<?php echo base_url();?>mantenimiento/ccliente">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </section>
</div>
