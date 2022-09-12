<div class="container-fluid pt-5">
    <div class="row mt-3 px-3 justify-content-center">
        <h1>Unidades Medida</h1>
    </div>

    <div class="row mt-3">
        <div class="col-md-3">
            <h3>Registrar Unidades</h3>
            <form action="<?php echo site_url('Almacen/insert_unidadesm'); ?>" method="post">
                <div class="form-group">
                    <laber for="">Descripcion</label>
                    <input type="text" class="form-control rounded-0" name="descripcion" id="" autocomplete="off">
                    
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
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($unidadesdm as $e)
                        {
                    ?>
                        <tr>
                            <th><?php echo $e->id_unidadesm; ?></th>
                            <td><?php echo $e->descripcion; ?></td>
                            <td><a href="<?php echo site_url('Almacen/eventosu?id_unidadesm=').$e->id_unidadesm; ?>">
                                <button type="button" class="btn btn-info">Editar</button>
                            </a></td>
                            <td><a href="<?php echo site_url('Almacen/eliminaru?id_unidadesm=').$e->id_unidadesm; ?>">
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