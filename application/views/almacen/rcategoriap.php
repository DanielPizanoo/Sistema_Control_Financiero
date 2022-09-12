<div class="container-fluid pt-5">
    <div class="row justify-content-center mt-3">
        <h1>Categorías de Productos</h1>
    </div>
    <div class="d-flex flex-row-reverse">
        <a href="<?= base_url(); ?>index.php/categoriap_csv/export">
            <button type="button" name="export" value="Export" class="btn btn-success">CSV</button>
        </a>
        <a href="<?= base_url(); ?>index.php/Almacen/CateProductosPDF">
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
                    foreach($rcategorias as $c)
                    {
                ?>
                    <tr>
                        <th><?php echo $c->id_tipo_producto; ?></th>
                        <td><?php echo $c->nombre; ?></td>
                    </tr>
                <?php
                    } // cierra foreach($estanques as $e)
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>