<div class="container-fluid pt-5">
    <div class="row justify-content-center mt-3">
        <h1>Productos</h1>
    </div>

    <div class="d-flex flex-row-reverse">
        <a href="<?= base_url(); ?>index.php/productos_csv/export">
            <button type="button" name="export" value="Export" class="btn btn-success">CSV</button>
        </a>
        <a href="<?= base_url(); ?>index.php/Almacen/ProductosPDF">
            <button type="button" class="btn btn-danger">PDF</button>
        </a>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="table-responsive px-3">
            
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Nombre</th>
                            <th>Tipo producto</th>
                            <th>Proveedor</th>
                            <th>Unidad Medida</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($rproductos as $pr)
                        {
                    ?>
                        <tr>
                            <th><?php echo $pr->id_producto; ?></th>
                            <td><?php echo $pr->nombre; ?></td>
                            <td><?php echo $pr->id_tipo_producto; ?></td>
                            <td><?php echo $pr->id_proveedor; ?></td>
                            <td><?php echo $pr->id_unidad_medida; ?></td>
                            <td><?php echo $pr->precio; ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
           
        </div>
    </div>
</div>