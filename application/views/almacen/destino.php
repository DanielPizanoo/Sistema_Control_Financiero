<div class="container-fluid pt-5">
    <div class="row mt-3 px-3 justify-content-center">
        <h1>Destinos</h1>
    </div>

    <div class="row mt-3">
        <div class="col-md-3">
            <h3>Registrar Destino</h3>
            <form action="<?php echo site_url('Almacen/insert_destino'); ?>" method="post">
                <div class="form-group">
                    <laber for="">Nombre</label>
                    <input type="text" class="form-control rounded-0" name="nombre" id="" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary rounded-0">Registrar</button>
            </form>
        </div>

        <div class="col-md-8">
            <h3>Registros Destino</h3>
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
                        foreach($destinos as $e)
                        {
                    ?>
                        <tr>
                            <th><?php echo $e->id_destino; ?></th>
                            <td><?php echo $e->nombre; ?></td>
                            <td><a href="<?php echo site_url('Almacen/eventosd?id_destino=').$e->id_destino; ?>">
                                <button type="button" class="btn btn-info">Editar</button>
                            </a></td>
                            <td><a href="<?php echo site_url('Almacen/eliminard?id_destino=').$e->id_destino; ?>">
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