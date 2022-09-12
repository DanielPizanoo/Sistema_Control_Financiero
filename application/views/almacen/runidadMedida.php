<div class="container-fluid pt-5">
    <div class="row mt-3 px-3 justify-content-center">
        <h1>Unidades Medida</h1>
    </div>

    <div class="d-flex flex-row-reverse">
        <a href="<?= base_url(); ?>index.php/unidadMedida_csv/export">
            <button type="button" name="export" value="Export" class="btn btn-success">CSV</button>
        </a>
        <a href="<?= base_url(); ?>index.php/Almacen/UMPDF">
        <button type="button" class="btn btn-danger">PDF</button>
        </a>
    </div>
    
    <div class="row mt-4 justify-content-center">
        <div class="table-responsive px-3">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($runidadesdm as $e)
                        {
                    ?>
                        <tr>
                            <th><?php echo $e->id_unidadesm; ?></th>
                            <td><?php echo $e->descripcion; ?></td>
                        </tr>
                    <?php
                        } // cierra foreach($estanques as $e)
                    ?>
                    </tbody>                    
            </table>
        </div>
    </div>
</div>