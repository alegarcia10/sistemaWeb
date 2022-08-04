<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cliente
            <small>Listado de Clientes</small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-9">
                        <a href="<?php echo base_url(); ?>mantenimiento/ccliente/cadd" class="btn btn-flat" id="botonVioleta"><span class="fa fa-plus"></span> Agregar Cliente</a>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar Cliente..">
                        <hr>
                    </div>
                </div>
                <?php if ($this->session->flashdata('correcto')) : ?>
                    <div class="alert alert-success">
                        <p><?php echo $this->session->flashdata('correcto') ?></p>
                    </div>
                <?php endif; ?>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover order-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>CUIT</th>
                                    <th>Nombre</th>
                                    <th>Domicilio</th>
                                    <th>Provincia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($clienteindex)) : ?>
                                    <?php foreach ($clienteindex as $atributos) :?>
                                        <tr>
                                            <td><?php echo $atributos->IdCliente; ?></td>
                                            <td><?php echo $atributos->DniCuit; ?></td>
                                            <td><?php echo $atributos->Nombre; ?></td>
                                            <td><?php echo $atributos->Domicilio; ?></td>
                                            <td><?php echo $atributos->Provincia; ?></td>
                                            <td>
                                                <div class="btn-group">

                                                    <a href="<?php echo base_url(); ?>mantenimiento/ccliente/cedit/<?php echo $atributos->IdCliente; ?>" class="btn btn-info" title="Modificar">
                                                        <span class="fa fa-pencil"></span>
                                                    </a>
                                                    <a id="deleteCliente" href="<?php echo base_url(); ?>mantenimiento/ccliente/cdelete/<?php echo $atributos->IdCliente; ?>" class="btn btn-danger btn-remove" title="Eliminar">
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
                </div>
            </div>
        </div>
    </section>
</div>
