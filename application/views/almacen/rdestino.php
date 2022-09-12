<div class="container-fluid pt-5">
    <div class="row mt-3 px-3 justify-content-center">
        <h1>Destinos</h1>
    </div>

    <div class="d-flex flex-row-reverse">
        <a href="<?= base_url(); ?>index.php/destino_csv/export">
            <button type="button" name="export" value="Export" class="btn btn-success">CSV</button>
        </a>
        <a href="<?= base_url(); ?>index.php/Almacen/DestinoPDF">
        <button type="button" class="btn btn-danger">PDF</button>
        </a>
    </div>
    
    <div class="row mt-4 justify-content-center">
        <div class="table-responsive px-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($rdestinos as $e)
                    {
                ?>
                    <tr>
                        <th><?php echo $e->id_destino; ?></th>
                        <td><?php echo $e->nombre; ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>