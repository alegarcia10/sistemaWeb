<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Remito N° <?php echo $remitoedit->IdRemito ?>
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
                        <form action="<?php echo base_url();?>mantenimiento/cremitos/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $remitoedit->IdRemito?>" name="txtIdRemito" id="txtIdRemito">
                            <div class="col-md-5 form-group">
                              <label for="cliente">Cliente&nbsp;&nbsp; (*)</label>
                							<? $this->select_items->sin_buscador2($cliente_select,(!empty($model->IdCliente))
                               ? $model->IdCliente : '',	'cliente','1',(!empty($consultar)) ? "disabled ":'required');?>
                			<input id="cliente_hidden" name="cliente_hidden" type="hidden" >
                			</div>
                            <div class="col-sm-3 form-group">
                                <label for="fecha">Fecha de Recepción</label>
                                <input type="text" id="txtfecha" name="txtfecha"  min="2020-01-01" max="2100-12-31" value="<?php echo !empty(form_error('txtfecha'))? set_value('txtfecha') :  date("d-m-Y", strtotime("$remitoedit->fecha"));?>" class= "form-control"   >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="vendedor">VENDEDOR</label>
                                <input type="text" id="txtvendedor" name="txtvendedor" maxlength="256" value="<?php echo !empty(form_error('txtvendedor'))? set_value('txtvendedor') : $remitoedit->vendedor ?>" class= "form-control" required >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="observaciones">OBSERVACIONES</label>
                                <input type="text" id="txtobservaciones" name="txtobservaciones" maxlength="1000" value="<?php echo !empty(form_error('txtobservaciones'))? set_value('txtobservaciones') : $remitoedit->observaciones ?>" class= "form-control"  >
                            </div>
                        
                            <div class="col-sm-6 form-group">
                                <a class="btn btn-success" href="<?php echo base_url();?>mantenimiento/cremitos">Volver</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                        <?php if($this->session->flashdata('error')):?>
                            <div class="alert alert-danger">
                                <p><?php echo $this->session->flashdata('error') ?> </p>
                            </div>
                            <?php endif ; ?>
                            <form action="<?php echo base_url();?>mantenimiento/cremitos/cupdateProducto" method="POST">
                                <div class="col-sm-8 form-group">
                                <h3>Detalle Productos</h3>
                                </div>
                                <input type="hidden" value="<?php echo $remitoedit->IdRemito ?>" name="txtIdRemito" id="txtIdRemito">
                               
                                <div class="col-sm-6 form-group">
                                    <label for="producto">Producto</label>
                                    <input type="text" id="txtproducto" name="txtproducto" class="form-control"  value="<?php echo set_value('txtproducto') ?>" >
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="text" id="txtcantidad" name="txtcantidad" class="form-control" value="<?php echo set_value('txtcantidad') ?>" >
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" id="txtprecio" name="txtprecio" class="form-control" step=".01" value="<?php echo set_value('txtprecio') ?>" >
                                </div>
                                <div class="col-sm-2">
                                    <br>
                                    <button class="btn btn-success" type="button" id="agregarProducto"><span class="fa fa-plus" aria-hidden="true" ></span> Agregar </button>
                                </div>
                                <div class="col-sm-12 form-group">
                                        <table id="example1" class="table table-bordered table-hover order-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                </tr>
                                            </thead>
                                            <tbody id='tbody1'>
                                                <?php if (!empty($producto)) : ?>
                                                    <?php foreach ($producto as $atributos) : ?>
                                                        <tr>
                                                            <td><?php echo $atributos->IdProducto; ?></td>
                                                            <td><?php echo $atributos->producto; ?></td>
                                                            <td><?php echo $atributos->cantidad; ?></td>
                                                            <td><?php echo $atributos->precio; ?></td>
                                                            <?php $data = $atributos->IdRemito; ?>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a title="Modificar" href="<?php echo base_url(); ?>mantenimiento/cremitos/ceditProd/<?php echo $atributos->IdProducto; ?>" class="btn btn-info ">
                                                                        <span class="fa fa-pencil"></span>
                                                                    </a>
                                                                    <a title="Eliminar" href="<?php echo base_url(); ?>mantenimiento/cremitos/cdeleteProd/<?php echo $atributos->IdProducto; ?>" class="btn btn-danger btn-remove deleteProductoTarea">
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

<script type="text/javascript">

$(document).ready(function(){

    var base_url= "<?php echo base_url();?>";
  $('#agregarProducto').on('click',function(){
        var idRemito =$('#txtIdRemito').val();
        var producto =$('#txtproducto').val();
        var cant =$('#txtcantidad').val();
        var precio =$('#txtprecio').val();
      
        if((producto=='') || (cant=='') ){

        }else{

        $('#txtproducto').val('');
        $('#txtcantidad').val('');
        $('#txtprecio').val('');
       
                $.ajax( {
                                    method:'POST',
                                    url:'<?php echo base_url(); ?>' + 'mantenimiento/cremitos/addProducto',
                                    dataType:'html',
                                    data:{producto:producto,idRemito:idRemito,cant:cant,precio:precio}})
                                   
                                    .done(function(r) {
                                        window.location.href=base_url+'/mantenimiento/cremitos/cedit/'+idRemito;
                                            //$("#tbody1").append(r['linksa']);
                                    });

        }

        });
    })
</script>