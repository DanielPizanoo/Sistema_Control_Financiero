<div class="container-fluid pt-5">
    <div class="row mt-3 px-3 justify-content-center">
        <h1>Conceptos</h1>
    </div>

    <div class="row mt-3">
        <div class="col-md-3">
            <h3>Registrar Concepto</h3>
            <form action="<?php echo site_url('Almacen/insert_concepto'); ?>" method="post">
                <div class="form-group">
                    <laber for="">Descripción</label>
                    <input type="text" class="form-control rounded-0" name="descripcion" id="" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary rounded-0">Registrar</button>
            </form>
        </div>

        <div class="col-md-8">
            <h3>Registros Conceptos</h3>
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
                        foreach($conceptos as $cp)
                        {
                    ?>
                        <tr>
                            <th><?php echo $cp->id_concepto; ?></th>
                            <td><?php echo $cp->descripcion; ?></td>
                            <td><a href="<?php echo site_url('Almacen/eventoscon?id_concepto=').$cp->id_concepto; ?>">
                                <button type="button" class="btn btn-info">Editar</button>
                            </a></td>
                            <td><a href="<?php echo site_url('Almacen/eliminarcon?id_concepto=').$cp->id_concepto; ?>">
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