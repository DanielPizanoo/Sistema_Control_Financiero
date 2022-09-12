<div class="container-fluid mt-5">
    <div class="row justify-content-center pt-2">
        <div class="text-center">
            <h1>Ciclos de cultivo</h1>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-3 mb-3">
            <h3>Registro</h3>
            <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('Usuario/insert_ciclo'); ?>">
                <div class="form-group">
                    <label for="" class="font-weight-bold">Fecha de inicio</label>
                    <input type="date" class="form-control rounded-0" name="fecha_inicio" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="" class="font-weight-bold">Estanque</label>
                    <select class="form-control rounded-0" name="estanque" id="estanque">
                        <option disabled selected>-- Seleccione un estanque --</option>
                        <?php
                            foreach($estanques as $e)
                            {
                                echo '<option value="'.$e->id_estanque.'">'.$e->identificador.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="font-weight-bold">Especie</label>
                    <select class="form-control rounded-0" name="biomasa" id="biomasa">
                        <option disabled selected>-- Seleccione una especie --</option>
                        <?php
                            foreach($biomasa as $b)
                            {
                                echo '<option value="'.$b->biomasa.'">'.$b->variedad.' (Proveedor: '.$b->proveedor.')'.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="font-weight-bold">Cantidad inicial</label>
                    <input type="number" step="0.01" class="form-control rounded-0" name="cantidad" required>
                </div>
                <button type="submit" class="btn main-bg text-light rounded-0">Registrar</button>
            </form>
        </div>
        <div class="col-md-9 mb-3">
            <h3>Ciclos</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Fecha Inicio</th>
                            <th>Estanque</th>
                            <th>Especie</th>
                            <th>Semana</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($siembras as $s)
                        {
                    ?>
                        <tr>
                            <th><?php echo $s->fecha_inicio; ?></th>
                            <td><?php echo $s->estanque; ?></td>
                            <td><?php echo $s->variedad; ?></td>
                            <td><?php echo $s->semana; ?></td>
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
