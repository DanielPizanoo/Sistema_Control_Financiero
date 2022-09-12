<div class="container-fluid pt-5">
    <div class="row mt-3 px-3 justify-content-center">
        <h1>Conceptos</h1>
    </div>

    <div class="d-flex flex-row-reverse">
        <a href="<?= base_url(); ?>index.php/conceptos_csv/export">
            <button type="button" name="export" value="Export" class="btn btn-success">CSV</button>
        </a>
        <a href="<?= base_url(); ?>index.php/Almacen/ConceptoPDF">
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
                    foreach($rconceptos as $cp)
                    {
                ?>
                    <tr>
                        <th><?php echo $cp->id_concepto; ?></th>
                        <td><?php echo $cp->descripcion; ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>