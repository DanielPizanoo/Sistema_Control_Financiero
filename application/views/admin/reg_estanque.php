<div class="container-fluid mt-5">
    <div class="row justify-content-center pt-2">
        <div class="text-center">
            <h1>Registro de estanques</h1>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-3 mb-3">
            <h3>Registro</h3>
            <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('Usuario/insert_estanque'); ?>">
                <div class="form-group">
                    <label for="">Identificador de estanque</label>
                    <input type="text" class="form-control rounded-0" name="identificador" placeholder="Ejemplo: Estanque 2" required>
                </div>
                <div class="form-group">
                    <label for="">Largo (metros)</label>
                    <input type="number" step="0.01" class="form-control rounded-0" name="medida_x" required>
                </div>
                <div class="form-group">
                    <label for="">Ancho (metros)</label>
                    <input type="number" step="0.01" class="form-control rounded-0" name="medida_y" required>
                </div>
                <div class="form-group">
                    <label for="">Profundidad aproximada (metros)</label>
                    <input type="number" step="0.01" class="form-control rounded-0" name="medida_z" required>
                </div>
                <button type="submit" class="btn main-bg text-light rounded-0">Registrar</button>
            </form>
        </div>
        <div class="col-md-9 mb-3">
            <h3>Estanques</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Identificador</th>
                            <th>Largo</th>
                            <th>Ancho</th>
                            <th>Profundidad</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($estanques as $e)
                        {
                    ?>
                        <tr>
                            <th><?php echo $e->identificador; ?></th>
                            <td><?php echo $e->medida_x; ?> m</td>
                            <td><?php echo $e->medida_y; ?> m</td>
                            <td><?php echo $e->medida_z; ?> m</td>
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
