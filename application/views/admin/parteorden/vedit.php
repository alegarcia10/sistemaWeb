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
                   <div class="row">
                       <?php if($this->session->flashdata('error')):?>
                        <div class="alert alert-danger">
                            <p><?php echo $this->session->flashdata('error') ?> </p>
                        </div>
                        <?php endif ; ?>
                        <form action="<?php echo base_url();?>mantenimiento/corden/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $ordenedit->idorden ?>" name="txtidorden" id="txtidorden">
                            <input type="hidden" value="<?php echo $ordenedit->idCliente ?>" name="txtidCliente" id="txtidCliente">
                            <div class=" col-sm-2 form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" id="txtfecha" name="txtfecha" value="<?php echo !empty(form_error('txtfecha'))? set_value('txtfecha') : $ordenedit->fecha ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="imc">I.M.C</label>
                                <input type="text" id="txtimc" name="txtimc" maxlength="5" value="<?php echo !empty(form_error('txtcimc'))? set_value('txtimc') : $ordenedit->imc ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="cuello">Cuello</label>
                                <input type="text" id="txtcuello" name="txtcuello" maxlength="5" value="<?php echo !empty(form_error('txtcuello'))? set_value('txtcuello') : $ordenedit->cuello ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="peso">Peso</label>
                                <input type="text" id="txtpeso" name="txtpeso" maxlength="5" value="<?php echo !empty(form_error('txtpeso'))? set_value('txtpeso') : $ordenedit->peso ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="pecho">Pecho</label>
                                <input type="text" id="txtpecho" name="txtpecho" maxlength="5" value="<?php echo !empty(form_error('txtpecho'))? set_value('txtpecho') : $ordenedit->pecho ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="brazo">Brazo</label>
                                <input type="text" id="txtbrazo" name="txtbrazo" maxlength="5" value="<?php echo !empty(form_error('txtbrazo'))? set_value('txtbrazo') : $ordenedit->brazo ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="muneca">Muñeca</label>
                                <input type="text" id="txtmuneca" name="txtmuneca" maxlength="5" value="<?php echo !empty(form_error('txtmuneca'))? set_value('txtmuneca') : $ordenedit->muneca ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="cintura">Cintura</label>
                                <input type="text" id="txtcintura" name="txtcintura" maxlength="5" value="<?php echo !empty(form_error('txtcintura'))? set_value('txtcintura') : $ordenedit->cintura ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="cadera">Cadera</label>
                                <input type="text" id="txtcadera" name="txtcadera" maxlength="5" value="<?php echo !empty(form_error('txtcadera'))? set_value('txtcadera') : $ordenedit->cadera ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="abdomen">Abdomen</label>
                                <input type="text" id="txtabdomen" name="txtabdomen" maxlength="5"value="<?php echo !empty(form_error('txtabdomen'))? set_value('txtabdomen') : $ordenedit->abdomen ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="muslo">Muslo</label>
                                <input type="text" id="txtmuslo" name="txtmuslo"maxlength="5"  value="<?php echo !empty(form_error('txtmuslo'))? set_value('txtmuslo') : $ordenedit->muslo ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" id="txtdescripcion" name="txtdescripcion" maxlength="200"value="<?php echo !empty(form_error('txtdescripcion'))? set_value('txtdescripcion') : $ordenedit->descripcion ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>

                            <div class=" col-sm-6 form-group">
                            <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/corden/listar/<?php echo $ordenedit->idCliente ?>">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                    </div>
               </div>
            </div>
        </div>
    </section>
</div>
