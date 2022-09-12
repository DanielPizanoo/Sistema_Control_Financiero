<div class="container-fluid pt-5">
    <div class="row mt-3 px-3 justify-content-center">
        <h1>Productos</h1>
    </div>

    <div class="row mt-3">
        <div class="col-md-3">
            <h3>Registrar Producto</h3>
            <form action="<?php echo site_url('Almacen/insert_producto'); ?>" method="post">
                <div class="form-group">
                    <laber for="" class="font-weight-bold">Nombre</label>
                    <input type="text" class="form-control rounded-0" name="nombre" id="" autocomplete="off">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Tipo producto</label>
                        <select class="form-control rounded-0" name="tipoprod">
                            <?php
                                foreach($catalogotipoproducto as $ctp)
                                {
                                    echo '<option value="'.$ctp->id_tipo_producto.'">'.$ctp->nombre.'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="font-weight-bold">Proveedor</label>
                        <select class="form-control rounded-0" name="proveedor">
                            <?php
                                foreach($catalogoproveedor as $cp)
                                {
                                    echo '<option value="'.$cp->id_proveedor.'">'.$cp->razon_social.'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="font-weight-bold">Unidad Medida</label>
                        <select class="form-control rounded-0" name="unidadm">
                            <?php
                                foreach($catalogounidades as $cu)
                                {
                                    echo '<option value="'.$cu->id_unidadesm.'">'.$cu->descripcion.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <label for="" class="font-weight-bold">Precio</label>
                    <input type="text" class="form-control rounded-0" name="precio" id="" autocomplete="off" require>
                </div>
                <button type="submit" class="btn btn-primary rounded-0">Registrar</button>
            </form>
        </div>

        <div class="col-md-8">
            <h3>Registros</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Nombre</th>
                            <th>Tipo producto</th>
                            <th>Proveedor</th>
                            <th>Unidad Medida</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($productos as $pr)
                        {
                    ?>
                        <tr>
                            <th><?php echo $pr->id_producto; ?></th>
                            <td><?php echo $pr->nombre; ?></td>
                            <td><?php echo $pr->id_tipo_producto; ?></td>
                            <td><?php echo $pr->id_proveedor; ?></td>
                            <td><?php echo $pr->id_unidad_medida; ?></td>
                            <td><?php echo $pr->precio; ?></td>
                            <td><a href="<?php echo site_url('Almacen/eventos?id_producto=').$pr->id_producto; ?>">
                                <button type="button" class="btn btn-info">Editar</button>
                            </a></td>
                            <td><a href="<?php echo site_url('Almacen/eliminar_productos?id_producto=').$pr->id_producto; ?>">
                                <button type="button" class="btn btn-warning">Eliminar</button> 
                            </a></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>