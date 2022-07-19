<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-6">
            <a href="<?php echo base_url(); ?>mantenimiento/corden/cadd/<?php echo $ordenindex->IdParte; ?>" class="btn  btn-flat" id="botonVioleta"><span class="fa fa-plus"></span> Agregar Consulta</a>
        </div>
    </section>
    <section class="content" id="cuerpo">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row" id="datos">
                    <div class="col-md-12">
                        <h1 id="H1A">ANAMNESIS NUTRICIONAL</h1>
                    </div>
                    <div class="col-md-12">
                        <h1 id="H1B">FICHA MEDICA</h1>
                    </div>
                    <div class="col-md-4">
                        <h4>Fecha: <?php echo $ordenindex->FechaRecepcion ;?> </h4>
                    </div>
                    <div class="col-md-4">
                        <h4>Tarea: <?php echo  $ordenindex->TareaDesarrollar;?> </h4>
                    </div>
                    <div class="col-md-4">
                        <h4>Precio: <?php echo $ordenindex->Precio ;?> </h4>
                    </div>
                    <div class="col-md-4">
                        <h4>Cliente: <?php echo $ordenindex->IdCliente ;?> </h4>
                    </div>

                </div>
                <div class="row" id="tablaProgreso">
                    <div class="col-md-12  ">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                $a = sizeof($ordenindex);
                                if ($a != 0) { ?>
                                    <tr>
                                        <?php
                                        $a = sizeof($ordenindex);


                                        for ($i = 0; $i <= $a; $i++) {
                                            $y = $i - 1;

                                            if ($i == 0) {
                                                echo '<td id="fila1" align="center">FECHA</td>';
                                            } else {
                                                $palabra = $ordenindex[$y]->fecha;
                                                echo '<td id="descripcion">' . "$palabra" . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $a = sizeof($ordenindex);
                                        for ($i = 0; $i <= $a; $i++) {
                                            $y = $i - 1;

                                            if ($i == 0) {
                                                echo '<td id="fila2" align="center">PESO</td>';
                                            } else {
                                                $palabra = $ordenindex[$y]->peso;
                                                echo '<td id="descripcion">' . "$palabra" . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $a = sizeof($ordenindex);
                                        for ($i = 0; $i <= $a; $i++) {
                                            $y = $i - 1;

                                            if ($i == 0) {
                                                echo '<td id="fila3" align="center">I.M.C</td>';
                                            } else {
                                                $palabra = $ordenindex[$y]->imc;
                                                echo '<td id="descripcion">' . "$palabra" . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $a = sizeof($ordenindex);
                                        for ($i = 0; $i <= $a; $i++) {
                                            $y = $i - 1;

                                            if ($i == 0) {
                                                echo '<td id="fila4" align="center">CUELLO</td>';
                                            } else {
                                                $palabra = $ordenindex[$y]->cuello;
                                                echo '<td id="descripcion">' . "$palabra" . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $a = sizeof($ordenindex);
                                        for ($i = 0; $i <= $a; $i++) {
                                            $y = $i - 1;

                                            if ($i == 0) {
                                                echo '<td id="fila1" align="center">PECHO</td>';
                                            } else {
                                                $palabra = $ordenindex[$y]->pecho;
                                                echo '<td id="descripcion">' . "$palabra" . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $a = sizeof($ordenindex);
                                        for ($i = 0; $i <= $a; $i++) {
                                            $y = $i - 1;

                                            if ($i == 0) {
                                                echo '<td id="fila2" align="center">BRAZO</td>';
                                            } else {
                                                $palabra = $ordenindex[$y]->brazo;
                                                echo '<td id="descripcion">' . "$palabra" . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $a = sizeof($ordenindex);
                                        for ($i = 0; $i <= $a; $i++) {
                                            $y = $i - 1;

                                            if ($i == 0) {
                                                echo '<td id="fila3" align="center">MUÑECA</td>';
                                            } else {
                                                $palabra = $ordenindex[$y]->muneca;
                                                echo '<td id="descripcion">' . "$palabra" . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $a = sizeof($ordenindex);
                                        for ($i = 0; $i <= $a; $i++) {
                                            $y = $i - 1;

                                            if ($i == 0) {
                                                echo '<td id="fila4" align="center">CINTURA</td>';
                                            } else {
                                                $palabra = $ordenindex[$y]->cintura;
                                                echo '<td id="descripcion">' . "$palabra" . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $a = sizeof($ordenindex);
                                        for ($i = 0; $i <= $a; $i++) {
                                            $y = $i - 1;

                                            if ($i == 0) {
                                                echo '<td id="fila1" align="center">CADERA</td>';
                                            } else {
                                                $palabra = $ordenindex[$y]->cadera;
                                                echo '<td id="descripcion">' . "$palabra" . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $a = sizeof($ordenindex);
                                        for ($i = 0; $i <= $a; $i++) {
                                            $y = $i - 1;

                                            if ($i == 0) {
                                                echo '<td id="fila2"align="center">ABDOMEN</td>';
                                            } else {
                                                $palabra = $ordenindex[$y]->abdomen;
                                                echo '<td id="descripcion">' . "$palabra" . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $a = sizeof($ordenindex);
                                        for ($i = 0; $i <= $a; $i++) {
                                            $y = $i - 1;

                                            if ($i == 0) {
                                                echo '<td id="fila3"align="center">MUSLO</td>';
                                            } else {
                                                $palabra = $ordenindex[$y]->muslo;
                                                echo '<td id="descripcion">' . "$palabra" . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $a = sizeof($ordenindex);
                                        for ($i = 0; $i <= $a; $i++) {
                                            $y = $i - 1;

                                            if ($i == 0) {
                                                echo '<td id="fila4"align="center">DESCRIPCION</td>';
                                            } else {
                                                $palabra = $ordenindex[$y]->descripcion;
                                                echo '<td id="descripcion">' . "$palabra" . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>


                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <H3>LISTA DE CONSULTAS</H3>
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <p><?php echo $this->session->flashdata('error') ?> </p>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-3">
                                <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar Orden..">
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-hover order-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha de Orden</th>
                                            <th>Peso</th>
                                            <th>Cuello</th>
                                            <th>Pecho</th>
                                            <th>Descripcion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //var_dump($ordenindex); die;
                                        ?>
                                        <?php if (!empty($ordenindex)) : ?>
                                            <?php foreach ($ordenindex as $atributos) : ?>
                                                <tr>
                                                    <td><?php echo $atributos->idorden; ?></td>
                                                    <td><?php echo $atributos->fecha; ?></td>
                                                    <td><?php echo $atributos->peso; ?></td>
                                                    <td><?php echo $atributos->cuello; ?></td>
                                                    <td><?php echo $atributos->pecho; ?></td>
                                                    <td><?php echo $atributos->descripcion; ?></td>



                                                    <?php $data = $atributos->idCliente; ?>
                                                    <td>
                                                        <div class="btn-group">

                                                            <a title="Modificar" href="<?php echo base_url(); ?>mantenimiento/corden/cedit//<?php echo $atributos->idorden; ?>" class="btn btn-info ">
                                                                <span class="fa fa-pencil"></span>
                                                            </a>
                                                            <a title="Eliminar" href="<?php echo base_url(); ?>mantenimiento/corden/cdelete/<?php echo $atributos->idorden; ?>" class="btn btn-danger btn-remove">
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
                            <div class="col-sm-6 form-group">

                                <a class="btn btn-success" href="<?php echo base_url(); ?>mantenimiento/ccliente">Volver</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
