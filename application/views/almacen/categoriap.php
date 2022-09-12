<div class="container-fluid pt-5">
    <div class="row mt-3 px-3 justify-content-center">
        <h1>Categorías de Productos</h1>
    </div>

    <div class="row mt-3">
        <div class="col-md-3">
            <h3>Registrar Producto</h3>
            <form action="<?php echo site_url('Almacen/insert_categoria'); ?>" method="post">
                <div class="form-group">
                    <laber for="">Nombre</label>
                    <input type="text" class="form-control rounded-0" name="nombre" id="" autocomplete="off">
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
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($categorias as $c)
                        {
                    ?>
                        <tr>
                            <th><?php echo $c->id_tipo_producto; ?></th>
                            <td><?php echo $c->nombre; ?></td>
                            <td><a href="<?php echo site_url('Almacen/eventosc?id_tipo_producto=').$c->id_tipo_producto; ?>">
                                <button type="button" class="btn btn-info">Editar</button>
                            </a></td>
                            <td><a href="<?php echo site_url('Almacen/eliminarc?id_tipo_producto=').$c->id_tipo_producto; ?>">
                                <button type="button" class="btn btn-warning">Eliminar</button>
                            </a></td>
                        </tr>
                    <?php
                        } // cierra foreach($estanques as $e)
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>