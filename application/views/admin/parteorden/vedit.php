<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Tarea
            <small>Editar</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">

               <div class="row">
                   <div class="col-md-12">
                   <div class="row">
                       <?php if($this->session->flashdata('error')):?>
                        <div class="alert alert-danger">
                            <p><?php echo $this->session->flashdata('error') ?> </p>
                        </div>
                        <?php endif ; ?>
                        <form action="<?php echo base_url();?>mantenimiento/cparteorden/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $parteordenedit->IdOrden ?>" name="txtidorden" id="txtidorden">
                            <input type="hidden" value="<?php echo $parteordenedit->IdParte ?>" name="txtidParte" id="txtidParte">
                            <div class=" col-sm-3 form-group">
                                <label for="fechaInicio">FechaInicio</label>
                                <input type="string" id="txtfechaInicio" name="txtfechaInicio" value="<?php echo !empty(form_error('txtfechaInicio'))? set_value('txtfechaInicio') : $parteordenedit->FechaInicio ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();" disabled>
                            </div>
                            <div class=" col-sm-3 form-group">
                                <label for="fechaInicio">FechaFin</label>
                                <input type="string" id="txtfechaFin" name="txtfechaFin" value="<?php echo !empty(form_error('txtfechaFin'))? set_value('txtfechaFin') : $parteordenedit->FechaFin ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();" disabled>
                            </div>
                            <div class=" col-sm-2 form-group">
                                <label for="fechaTranscurrido">Tiempo Transcurrido</label>
                                <input type="string" id="txtTranscurrido" name="txtTranscurrido" value="<?php echo !empty(form_error('txtTranscurrido'))? set_value('txtTranscurrido') : $hora ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();" disabled>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Completa</label><br>
                                <input class="chk_input" type="checkbox" id="habilitado" name="habilitado" data-width="20" data-height="20" disabled <?=(!empty($parteordenedit->Completa)&&$parteordenedit->Completa=="1")?'checked':''?> <?=(!empty($consultar)) ? "disabled" : "";?> <?=(!isset($parteordenedit->Completa))?'checked':''?> />
                                <span class="checkmark"></span>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="tarea">Tarea</label>
                                <input type="text" id="txttarea" name="txttarea" maxlength="500" value="<?php echo !empty(form_error('txtctarea'))? set_value('txttarea') : $parteordenedit->TareaDesarrollada ?>" class= "form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="col-sm-6 form-group">
                                <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/cparteorden/listar/<?php echo $parteordenedit->IdOrden;?>">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>

                          </form>
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <?php if($this->session->flashdata('error')):?>
                         <div class="alert alert-danger">
                             <p><?php echo $this->session->flashdata('error') ?> </p>
                         </div>
                         <?php endif ; ?>

                         <form action="<?php echo base_url();?>mantenimiento/cparteorden/cupdate" method="POST">
                              <div class="col-sm-6 form-group">
                                <h3>Tecnicos</h3>
                              </div>
                             <input type="hidden" value="<?php echo $parteordenedit->IdOrden ?>" name="txtidorden" id="txtidorden">
                             <input type="hidden" value="<?php echo $parteordenedit->IdParte ?>" name="txtidParte" id="txtidParte">
                               <div class="col-sm-8 form-group" >
                                   <label class="control-label" for="tipo_tecnico">Tecnico</label>
                                   <?$this->select_items->sin_buscador($tipo_tecnico_select, '','tipo_tecnico','1', 'required');?>
                               </div>

                               <div class="col-sm-2">
                                 <br>
                                 <button class="btn btn-success" type="button" id="buscar2"><span class="fa fa-search" aria-hidden="true" ></span>Agregar</button>
                               </div>
                               <div class="col-sm-12 form-group">
                                     <table id="example1" class="table table-bordered table-hover order-table">
                                         <thead>
                                             <tr>
                                                 <th>ID Tecnico</th>
                                                 <th>Nombre</th>
                                             </tr>
                                         </thead>
                                         <tbody id='tbody2'>
                                             <?php if (!empty($tecnico_select)) : ?>
                                                 <?php foreach ($tecnico_select as $atributos) : ?>
                                                     <tr>
                                                         <td><?php echo $atributos->IdParte; ?></td>
                                                         <td ><?php echo $atributos->Nombre; ?></td>
                                                         <td>
                                                             <div >
                                                               <a title="Eliminar" href="<?php echo base_url(); ?>mantenimiento/cparteorden/ceditTecnico/<?php echo $atributos->Dni; ?>/<?php echo $atributos->IdParte; ?>" class="btn btn-danger ">
                                                                   <span class="fa fa-remove"></span>
                                                               </a>
                                                             </div>
                                                         </td>
                                                     </tr>
                                                 <?php endforeach ?>
                                             <?php endif; ?>
                                         </tbody>
                                     </table>
                               </div>
                           </form>
                       </div>
                    </div>
               <div class="col-md-6">
                 <div class="row">
                   <?php if($this->session->flashdata('error')):?>
                    <div class="alert alert-danger">
                        <p><?php echo $this->session->flashdata('error') ?> </p>
                    </div>
                    <?php endif ; ?>
                    <form action="<?php echo base_url();?>mantenimiento/cparteorden/cupdate" method="POST">
                        <div class="col-sm-6 form-group">
                          <h3>Materiales</h3>
                        </div>
                        <input type="hidden" value="<?php echo $parteordenedit->IdOrden ?>" name="txtidorden" id="txtidorden">
                        <input type="hidden" value="<?php echo $parteordenedit->IdParte ?>" name="txtidParte" id="txtidParte">
                          <div class="col-sm-7 form-group">
                              <label for="material">Descripcion</label>
                              <input type="text" id="txtmaterial" name="txtmaterial" class="form-control" value="<?php echo set_value('txtmaterial') ?>" onblur="this.value=this.value.toUpperCase();" required>
                          </div>
                          <div class="col-sm-2 form-group">
                              <label for="cantidad">Cantidad</label>
                              <input type="number" id="txtcantidad" name="txtcantidad" class="form-control" value="<?php echo set_value('txtcantidad') ?>" onblur="this.value=this.value.toUpperCase();" required>
                          </div>
                          <div class="col-sm-2">
                            <br>
                            <button class="btn btn-success" type="button" id="buscar1"><span class="fa fa-search" aria-hidden="true" ></span>Agregar</button>

                          </div>
                          <div class="col-sm-12 form-group">
                                <table id="example1" class="table table-bordered table-hover order-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Material</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody id='tbody1'>
                                        <?php if (!empty($material)) : ?>
                                            <?php foreach ($material as $atributos) : ?>
                                                <tr>
                                                    <td><?php echo $atributos->IdMat; ?></td>
                                                    <td><?php echo $atributos->Descripcion; ?></td>
                                                    <td><?php echo $atributos->Cantidad; ?></td>

                                                    <?php $data = $atributos->IdOrden; ?>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a title="Modificar" href="<?php echo base_url(); ?>mantenimiento/cparteorden/ceditMat/<?php echo $atributos->IdMat; ?>" class="btn btn-info ">
                                                                <span class="fa fa-pencil"></span>
                                                            </a>
                                                            <a title="Eliminar" href="<?php echo base_url(); ?>mantenimiento/cparteorden/cdeleteMat/<?php echo $atributos->IdMat; ?>" class="btn btn-danger btn-remove">
                                                                <span class="fa fa-remove"></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                          </div>
                    </form>
                  </div>
               </div>

               </div>
            </div>
        </div>
    </section>
</div>


<script>
$(document).ready(function(){



    $('#buscar1').on('click',function(){
    var material =$('#txtmaterial').val();
    var idOrden =$('#txtidorden').val();
    var idParte =$('#txtidParte').val();
    var cant =$('#txtcantidad').val();


    $.ajax( {
                        method:'POST',
                        url:'<?php echo base_url(); ?>' + 'mantenimiento/Cparteorden/addMaterial',
                        dataType:'html',
                        data:{material:material,idOrden:idOrden,idParte:idParte,cant:cant}})
                        .done(function(r) {

                          r = JSON.parse(r);

                          $("#tbody1").append(r['linksa']);


                        });

    });

    $('#buscar2').on('click',function(){
      var tecnico =$('#tipo_tecnico').val();
      var idParte =$('#txtidParte').val();
      var idParte =$('#txtidParte').val();



                $.ajax( {
                        method:'POST',
                        url:'<?php echo base_url(); ?>' + 'mantenimiento/Cparteorden/addTecnicoOrden',
                        dataType:'html',
                        data:{tecnico:tecnico,idParte:idParte}})
                        .done(function(r) {
                          r = JSON.parse(r);
                          nombre=r['linksa'];
                          var tel = '<tr><td>'+idParte+'</td><td>'+nombre+'</td><td><div><a title="Eliminar" href="'+idParte+'ref'+tecnico+'" class="btn btn-danger"><span class="fa fa-remove"></span></a></div></td></tr>';

                          $("#tbody2").append(tel);


                        });

    });






    /*
    <label for="materiales">
      Materiales
      <div class="btn btn-success" id="btnexample1">
      </div>
    </label>

    $("#btnexample1").on('click',function(){
      alert('hola');
      i=0;

      $("#example1")
      .append
      (
        $('<tr>')
        .append
        (
          $('<td>')
          .append
          (
            $('<input>').attr('type', 'text').attr('name','nombre[]').addClass('form-control')
          )
        )
        .append
        (
          $('<td>')
          .append
          (
            $('<input>').attr('type', 'text').attr('name','cantidad[]').addClass('form-control')
          )
        )
        .append
        (
          $('<td>')
          .append
          (
            $('<div>').addClass('btn btn-primary').text('Guardar')
          )
          .append
          (
            $('<div>').addClass('btn btn-danger').text('Eliminar')
          )
        )
      )

    });*/










})
</script>
