<div class="container-fluid pt-5">
    <div class="row justify-content-center mt-3">
        <h1>Proveedores</h1>
    </div>

    <div class="d-flex flex-row-reverse">
        <a href="<?= base_url(); ?>index.php/proveedores_csv/export">
            <button type="button" name="export" value="Export" class="btn btn-success">CSV</button>
        </a>
        <a href="<?= base_url(); ?>index.php/Almacen/ProPDF">
            <button type="button" class="btn btn-danger">PDF</button>
        </a>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="table-responsive px-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Razón Social</th>
                            <th>RFC</th>
                            <th>País</th>
                            <th>Estado</th>
                            <th>Ciudad</th>
                            <th>Domicilio</th>
                            <th>Código Postal</th>
                            <th>Teléfono</th>
                            <th>Celular</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($rproveedores as $pv)
                        {
                    ?>
                        <tr>
                            <th><?php echo $pv->id_proveedor; ?></th>
                            <td><?php echo $pv->razon_social; ?></td>
                            <td><?php echo $pv->rfc; ?></td>
                            <td><?php echo $pv->pais; ?></td>
                            <td><?php echo $pv->estado; ?></td>
                            <td><?php echo $pv->ciudad; ?></td>
                            <td><?php echo $pv->domicilio; ?></td>
                            <td><?php echo $pv->cp; ?></td>
                            <td><?php echo $pv->telefono; ?></td>
                            <td><?php echo $pv->celular; ?></td>
                            <td><?php echo $pv->correo; ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            
        </div>
    </div>
</div>