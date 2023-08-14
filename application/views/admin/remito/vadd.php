<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Remito
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
                            <form action="<?php echo base_url(); ?>mantenimiento/cremitos/cinsert" method="POST">
                                <div class="col-sm-2 form-group">
                                  <label for="fecha">FECHA</label>
                                  <input type="date" id="txtfecha" name="txtfecha" class="form-control" min="2020-01-01" max="2100-12-31" value="<?php echo set_value('txtfecha') ?>" required >
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label" for="tipo_cliente">CLIENTE (*)</label>
                                    <?$this->select_items->sin_buscador($tipo_cliente_select, '','tipo_cliente','1', 'required');?>
                                </div>
                                <div class=" col-sm-3 form-group">
                                    <label for="vendedor">VENDEDOR</label>
                                    <input type="text" id="txtvendedor" name="txtvendedor" maxlength="50"class="form-control" value="<?php echo set_value('txtvendedor') ?>"  >
                                </div>
                                <div class=" col-sm-12 form-group">
                                    <label for="obser">OBSERVACIONES</label>
                                    <input type="text" id="txtobser" name="txtobser" maxlength="1000"class="form-control" value="<?php echo set_value('txtobser') ?>">
                                </div>
                                <div class="col-sm-12 form-group">
                                    <a class="btn btn-success" href="<?php echo base_url(); ?>mantenimiento/cremitos">Volver</a>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>

                            </form>
                        </div>
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
                                <input type="hidden" value="<?php echo $remitoedit->IdProducto ?>" name="txtIdProducto" id="txtIdProducto">
                                <div class="col-sm-12 form-group">
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
                                    <button class="btn btn-success" type="button" id="buscar1"><span class="fa fa-plus" aria-hidden="true" ></span> Agregar </button>
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
                                                            <td><?php echo $atributos->Detalle; ?></td>
                                                            <td><?php echo $atributos->Cantidad; ?></td>
                                                            <td><?php echo $atributos->Precio; ?></td>
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

  $('#buscar1').on('click',function(){
      $("#exampleModal").modal("show");
  });

  $('#agregarProducto').on('click',function(){

        var idRemito =$('#txtIdRemito').val();
        var idProducto =$('#txtIdProducto').val();
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
                                    url:'<?php echo base_url(); ?>' + 'mantenimiento/Cremitos/addProducto',
                                    dataType:'html',
                                    data:{producto:producto,idRemito:idRemito,idProducto:idProducto,cant:cant,precio:precio}})
                                    .done(function(r) {

                                    r = JSON.parse(r);
                                    window.location.href=base_url+'/mantenimiento/cremitos/cedit/'+idProducto;
                                    //$("#tbody1").append(r['linksa']);
                                    });

        }

        });

</script>
