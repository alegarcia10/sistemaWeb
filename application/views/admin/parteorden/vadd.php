<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Nueva Consulta
            <small><?=$clienteindex->apellido.' '.$clienteindex->nombre;?></small>
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
                        <form action="<?php echo base_url();?>mantenimiento/corden/cinsert" method="POST">
                        <input type="hidden" value="<?php echo $clienteindex->idClientes ?>" name="txtidcliente" id="txtidcliente">
                            <div class="col-sm-2 form-group <?php echo !empty(form_error('txtfecha'))? 'has-error' : '';?>">
                                <label for="fecha">Fecha</label>
                                <input type="date" id="txtfecha" name="txtfecha" class="form-control" required  value="<?php echo set_value('txtfecha') ?>"onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtfecha','<span class="help-block">','</span>')?>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="imc">I.M.C</label>
                                <input type="text" id="txtimc" name="txtimc"maxlength="5" class="form-control" value="<?php echo set_value('txtimc') ?>" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="cuello">Cuello</label>
                                <input type="text" id="txtcuello" name="txtcuello"maxlength="5" class="form-control" value="<?php echo set_value('txtcuello') ?>" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="peso">Peso</label>
                                <input type="text" id="txtpeso" name="txtpeso" maxlength="5" class="form-control" value="<?php echo set_value('txtpeso') ?>" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="pecho">Pecho</label>
                                <input type="text" id="txtpecho" name="txtpecho" maxlength="5"class="form-control" value="<?php echo set_value('txtpecho') ?>" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="brazo">Brazo</label>
                                <input type="text" id="txtbrazo" name="txtbrazo" maxlength="5" class="form-control" value="<?php echo set_value('txtbrazo') ?>" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="muneca">Muneca</label>
                                <input type="text" id="txtmuneca" name="txtmuneca" maxlength="5" class="form-control" value="<?php echo set_value('txtmuneca') ?>" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="cintura">Cintura</label>
                                <input type="text" id="txtcintura" name="txtcintura" maxlength="5" class="form-control" value="<?php echo set_value('txtcintura') ?>" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="cadera">Cadera</label>
                                <input type="text" id="txtcadera" name="txtcadera" maxlength="5" class="form-control" value="<?php echo set_value('txtcadera') ?>" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="abdomen">Abdomen</label>
                                <input type="text" id="txtabdomen" name="txtabdomen" maxlength="5" class="form-control" value="<?php echo set_value('txtabdomen') ?>" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="muslo">Muslo</label>
                                <input type="text" id="txtmuslo" name="txtmuslo" maxlength="5" class="form-control" value="<?php echo set_value('txtmuslo') ?>" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="desripcion">Desripcion</label>
                                <input type="text" id="txtdescripcion" name="txtdescripcion" maxlength="200"class="form-control" value="<?php echo set_value('txtdescripcion') ?>" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-6 form-group">
                            <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/corden/listar/<?php echo $clienteindex->idClientes ?>">Volver</a>
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
